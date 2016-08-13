<?php

namespace App\Http\Controllers;

use App\Citizen;
use App\Colony;
use App\Http\Requests;
use App\Http\Requests\PetitionPublicRequest;
use App\PersonalInformation;
use App\Problem;
use App\Request as Petition;
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
                $counters[$typology->id]=Petition::countTypology($typology->id)->count();
            }
            $counters=json_encode($counters);
        if (in_array( 'Root' , $role_user)) {
           return view("admin.users.profile",compact('user'));
        } else {
                if (in_array( 'Administrador' , $role_user)) {
                    return view('pages.index',compact('typologies','counters'));
                } else {
                        if (in_array( 'usuario' , $role_user)) 
                            {return view("admin.users.profile",compact('user'));} 
                        else { abort(404); }   
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
    public function store(Request $request)
    {   
       
        $colony=Colony::findOrFail($request->get('colony_id'));
        $sectorNumber=$colony->sector->number;
        $sector=$colony->sector; 

        $citizen_data= new PersonalInformation;
            $citizen_data->name=$request->name;
            $citizen_data->paternal_surname=$request->paternal_surname;
            $citizen_data->maternal_surname=$request->maternal_surname;
            $citizen_data->house_phone=$request->house_phone;
            $citizen_data->colony_id=$request->citizen_colony_id;
            $citizen_data->street=$request->citizen_street;
        $citizen_data->save();
       // dd('error');
        $citizen = Citizen::create($request->all());

        $citizen->personalInformation()->associate(PersonalInformation::find($citizen_data->id))->save();

        $inquiry = new Petition($request->all());
        $inquiry->request_priority_id=2;
        $inquiry->brigade_id=$sector->brigadesByTypology()->where('typology_id',Problem::findOrFail($request->problem_id)->typology->id)->first()->id;
        $inquiry->request_state_id=1;
        $inquiry->concerned()->associate(Citizen::findOrFail($citizen->id));
        $inquiry->creator()->associate(Citizen::findOrFail($citizen->id));
        $inquiry->save();

        return redirect('Peticion-publica/'.$inquiry->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $inquiry=Petition::findOrFail($id);
        $tipologiesRelations=Typology::with('problems','supervisions')->get(['id','name'])->toJson();
        $citizen = [$inquiry->concerned->id => $inquiry->concerned->full_name];

        $defaultBrigade=$inquiry->sector->brigadesByTypology()->where('typology_id',$inquiry->typology_id)->get();
        $optionalBrigades=$inquiry->sector->brigades()->where('typology_id',$inquiry->typology_id)->get();

        $brigades=$defaultBrigade->merge($optionalBrigades)->lists('name', 'id');

        $inquiry->load(['files' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        $inquiryImages = $inquiry->files->where('type', 'image');
        $images = collect([]);

        foreach ($inquiryImages as $inquiryImage) {
            $image['src'] = route('requests.files.show', [$inquiry->id, $inquiryImage->id]);
            $image['w'] = 964;
            $image['h'] = 1024;
            $image['title'] = $inquiryImage->display_name.'<br>por '.$inquiryImage->owner->full_name;
            $images->push($image);
        }
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
        return view('pages.public.requests.edit', compact('tipologiesRelations','inquiry','citizen','brigades','images','typologies','priorities','colonies','state'));
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
}
