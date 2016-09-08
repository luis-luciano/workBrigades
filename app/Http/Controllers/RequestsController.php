<?php


namespace App\Http\Controllers;

use App\Brigade;
use App\User;
use App\Colony;
use App\Http\Requests;
use App\SettlementType;
use App\Supervision;
use App\Typology;
use App\RequestPriority;
use Carbon\Carbon;
use App\Sector;
use App\Problem;
use App\Citizen;
use App\RequestRejection;
use App\Request as Inquiry;
use App\Http\Requests\StoreRequestRequest;
use App\RequestState;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function __construct() 
    {
       $this->middleware('auth', ['only' => ['index','create','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('index.requests');
        $requestStates=RequestState::lists('label','id');
        $supervisions=Supervision::lists('name','id');
      
        $search = [
            'id' => $request->get('folio', ""),
            'citizen' => $request->get('citizen', ""),
            'supervisions' => auth()->user()->supervisions_id,
            'states' => $request->get('request_states', []),
        ];

        $requests = Inquiry::search($search)->paginateForTable();
       
        return view('admin.requests.index',compact('requests','requestStates','supervisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $tipologiesRelations=Typology::with('problems','supervisions')->get(['id','name'])->toJson();

        return view('admin.requests.create', compact('tipologiesRelations','citizen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestRequest $request)
    {
        $inquiry = new Inquiry($request->all());
        $inquiry->creator()->associate(auth()->user());
        $inquiry->concerned()->associate(Citizen::findOrFail($request->citizen_id));
        $inquiry->save();

        $inquiry->supervisions()->attach(Typology::findOrFail($request->typology_id)->supervisions()->pluck('id')->toArray());

        alert()->success(trans('messages.success.store'));

        return redirect()->route('requests.edit',$inquiry);
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
    public function edit(Inquiry $inquiry)
    {

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
        
        return view('admin.requests.edit', compact('tipologiesRelations','inquiry','citizen','brigades','images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Inquiry $inquiry)
    {
        $this->authorize('creator', $inquiry);
        
        $inquiry->update($request->all());
        $inquiry->concerned()->associate(Citizen::findOrFail($request->citizen_id));
        $inquiry->save();

        $inquiry->supervisions()->sync(Typology::findOrFail($request->typology_id)->supervisions->lists('id')->toArray());

        alert()->success(trans('messages.success.update'));

        return redirect()->route('requests.edit',$inquiry);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inquiry $inquiry)
    {
        $this->authorize('creator', $inquiry);

        $inquiry->delete();

        alert()->success(trans('messages.success.destroy'));

        return redirect()->route('requests.index');
    }

    public function impress()
    {
        $requests=Inquiry::with('colony.sector')->get();
        $requests=$requests->sortBy('brigade_name');
        $requests=$requests->sortBy('sector_number')->groupBy('brigade_id');
        
       return view('admin.requests.print',compact('requests'));
    }

    public function conclude(Inquiry $inquiry)
    {
        if($inquiry->state->id == 5){
            $rejectionId=$inquiry->rejection->id;
            $inquiry->request_rejection_id=null;
            $inquiry->save();
            RequestRejection::destroy($rejectionId);
        }
        $inquiry->changeStateTo('concluded');

        $inquiry->finish_date=Carbon::now();
        
        $inquiry->save();

        alert()->success(trans('messages.success.update'));

        return redirect(route('requests.edit', compact('inquiry')).'#tab_more');
    }

    public function inProcess(Inquiry $inquiry)
    {
        $inquiry->changeStateTo('in_process');

        alert()->success(trans('messages.success.update'));

        return redirect(route('requests.edit', compact('inquiry')).'#tab_more');
    }

    public function findSectorBrigade(Request $request){
        
        $colony=Colony::findOrFail($request->get('colony'));
        $sectorNumber=$colony->sector->number;
        $sector=$colony->sector;

        $html="";

        $default=$sector->brigadesByTypology()->where('typology_id',$request->get('typology'))->get();
        $others=$sector->brigades()->where('typology_id',$request->get('typology'))->get();
        if(!$default->isEmpty() and !$others->isEmpty()){
            $default=$default->first();
            
            $html.="<option value=".$default->id."> ".$default->name." </option>\n";
            foreach ($others as $brigade) {
                 $html.="<option value=".$brigade->id."> ".$brigade->name." </option>\n";
            }

            $data=[
                'sector' => $sectorNumber,
                'brigades' => $html,
                'defaultId' => $default->id
            ];
        }
        else{
            $data=[
                'sector' => "",
                'brigades' => "",
                'defaultId' => ""
            ];
        }
    
        
        return response()->Json($data);
    }
}
