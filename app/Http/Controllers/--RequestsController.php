<?php


namespace App\Http\Controllers;

use App\Brigade;
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
use App\Request as Inquiry;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // 71
    {
        auth()->user()->authorized(71) ?  : abort(403);

        $requests=Inquiry::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.requests.index',compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create() // 72
    {
        auth()->user()->authorized(72) ?  : abort(403);

        $tipologiesRelations=Typology::with('problems','supervisions')->get(['id','name'])->toJson();

        return view('admin.requests.create', compact('tipologiesRelations','citizen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //73
    {
        auth()->user()->authorized(73) ?  : abort(403);

        $inquiry = new Inquiry($request->all());
        //$inquiry->creator()->associate($this->currentUser);
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
    public function show($id) //74
    {
        auth()->user()->authorized(74) ?  : abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inquiry $inquiry) // 75
    {
        auth()->user()->authorized(75) ?  : abort(403);

        $tipologiesRelations=Typology::with('problems','supervisions')->get(['id','name'])->toJson();
        $citizen = [$inquiry->concerned->id => $inquiry->concerned->full_name];

        $defaultBrigade=$inquiry->sector->brigadesByTypology()->where('typology_id',$inquiry->typology_id)->get();
        $optionalBrigades=$inquiry->sector->brigades()->where('typology_id',$inquiry->typology_id)->get();

        $brigades=$defaultBrigade->merge($optionalBrigades)->lists('name', 'id');
        return view('admin.requests.edit', compact('tipologiesRelations','inquiry','citizen','brigades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Inquiry $inquiry) //76
    {
        auth()->user()->authorized(76) ?  : abort(403);

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
    public function destroy($id) //77
    {
        auth()->user()->authorized(77) ?  : abort(403);
    }

    public function findSectorBrigade(Request $request){

        // if(!$request->ajax()){
        //     abort(403);
        // }
        
        $colony=Colony::findOrFail($request->get('colony'));
        $sectorNumber=$colony->sector->number;
        $sector=$colony->sector;

        $html="";

        $default=$sector->brigadesByTypology()->where('typology_id',$request->get('typology'))->get();
        $others=$sector->brigades()->where('typology_id',$request->get('typology'))->get();
        if(!$default->isEmpty() and !$others->isEmpty()){
            $default=$default->first();
            
            $html.="<option value=".$default->id." selected> ".$default->name." </option>\n";
            foreach ($others as $brigade) {
                 $html.="<option value=".$brigade->id."> ".$brigade->name." </option>\n";
            }
        }


        
        $data=[
                'sector' => $sectorNumber,
                'brigades' => $html,
                'defaultId' => $default->id
            ];
        return response()->Json($data);
    }
}
