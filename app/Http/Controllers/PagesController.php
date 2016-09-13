<?php

namespace App\Http\Controllers;

use Validator;
use App\Citizen;
use App\Colony;
use App\File;
use App\Http\Requests;
use App\Http\Requests\PetitionPublicRequest;
use App\Http\Requests\RequestPublicRequest;
use App\PersonalInformation;
use App\Problem;
use App\Request as Inquiry;
use App\RequestPriority;
use App\Typology;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check()) {
            $user=User::find(auth()->user()->id);
            $role_user=auth()->user()->roles()->lists('name')->toArray();    
            $typologies=Typology::all();
            $counters=array();
            foreach ($typologies as $typology) { 
                $counters[$typology->id]=Inquiry::countTypology($typology->id)->count();
            }
            $counters=json_encode($counters);
        if (in_array( 'administrator' , $role_user) || in_array( 'supervisor' , $role_user)) {
           return view('pages.index',compact('typologies','counters'));
        } else {
                if (in_array( 'operator' , $role_user)) {
                    return redirect()->route('requests.index');
                } else {
                        return view("admin.users.profile",compact('user'));
                    } 
                }
        } 
        else { return view('pages.welcome');}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       
        $colonies=Colony::lists('name','id');
        $problems=Problem::lists('name','id');
        return view('pages.public.requests.create', compact('colonies','problems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestPublicRequest $request)
    {   
        //dd($request->all());
        $sector=Colony::findOrFail($request->get('colony_id'))->sector; 

        $citizen_data= PersonalInformation::create($request->all());
        
        $citizen = Citizen::create($request->all());

        $citizen->personalInformation()->associate(PersonalInformation::find($citizen_data->id))->save();

        $inquiry = new Inquiry($request->all());
        $inquiry->request_priority_id=2;
        $inquiry->brigade_id=$sector->brigadesByTypology()->where('typology_id',Problem::findOrFail($request->problem_id)->typology->id)->first()->id;
        $inquiry->request_state_id=1;
        $inquiry->concerned()->associate(Citizen::findOrFail($citizen->id));
        $inquiry->creator()->associate(Citizen::findOrFail($citizen->id));
        $inquiry->save();

        $inquiry->supervisions()->attach(Typology::findOrFail(Problem::findOrFail($request->problem_id)->typology->id)->supervisions()->pluck('id')->toArray());
        
        if ($request->file) {
             $this->uploadFile($request,$inquiry);
         } 

         
        return redirect('Peticion-publica/'.$inquiry->id.'/edit');
    }

    private function uploadFile(Request $request, Inquiry $inquiry)
    {
        $file = File::fromForm($request->file('file'), $inquiry->id, Inquiry::$uploadsPath);

        //alert()->success(trans('messages.success.store'));

        return File::checkUpload($file, function () use ($inquiry, $file) {
            $inquiry->addFile($file);
        });
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function FindRequest(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'folio' => 'required|numeric|exists:requests,id',
            'pin' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('Peticion-publica')
                        ->withErrors($validator)
                        ->withInput();
        }

        $inquiry=Inquiry::findOrFail($request->folio);

        if ($inquiry->pin == $request->pin ) {
            return redirect('Peticion-publica/'.$inquiry->id.'/edit');
        } else {
            $message='Verifica tus Datos, el PIN es incorrecto';

            return view('pages.welcome',compact('message'));
        }
        
        return $inquiry;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $inquiry=Inquiry::findOrFail($id);
        $tipologiesRelations=Typology::with('problems','supervisions')->get(['id','name'])->toJson();
        $citizen = [$inquiry->concerned->id => $inquiry->concerned->full_name];

        $defaultBrigade=$inquiry->sector->brigadesByTypology()->where('typology_id',$inquiry->typology_id)->get();
        $optionalBrigades=$inquiry->sector->brigades()->where('typology_id',$inquiry->typology_id)->get();

        $brigades=$defaultBrigade->merge($optionalBrigades)->lists('name', 'id');

        $inquiry->load(['files' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        $typologies=Typology::lists('name','id');
        $priorities=RequestPriority::lists('name','id');
        $colonies=Colony::lists('name','id');

        switch ($inquiry->request_state_id) {
            case 1: $state='btn-primary'; break;
            case 2: $state='btn-info'; break;
            case 3: $state='btn-success'; break;
            case 4: $state='btn-warning'; break;
            case 5: $state='btn-danger '; break;
        }
        return view('pages.public.requests.edit', compact('tipologiesRelations','inquiry','citizen','brigades','typologies','priorities','colonies','state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showGraphics()
    {
        $typologies=Typology::all();
            $counters=array();
            foreach ($typologies as $typology) { 
                $counters[$typology->id]=Inquiry::countTypology($typology->id)->count();
            }
            $counters=json_encode($counters);

        return view('pages.index',compact('typologies','counters'));

    }
}
