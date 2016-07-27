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
    public function index()
    {
        $requests=Inquiry::paginate(10);
        return view('admin.requests.index',compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $priorities=RequestPriority::lists('name','id');
        $typologies=Typology::lists('name','id');
        $tipologiesRelations=Typology::with('problems','supervisions')->get(['id','name'])->toJson();

        $citizen=Citizen::first();
        $citizen=[$citizen->id=>$citizen->fullName];
        return view('admin.requests.create', compact('priorities','tipologiesRelations','typologies','citizen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inquiry = new Inquiry($request->all());
        //$inquiry->creator()->associate($this->currentUser);
        $inquiry->concerned()->associate(Citizen::findOrFail($request->citizen_id));
        $inquiry->save();

        return redirect()->route('requests.index');
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
        $priorities=RequestPriority::lists('name','id');
        $typologies=Typology::lists('name','id');
        $tipologiesRelations=Typology::with('problems','supervisions')->get(['id','name'])->toJson();
        return view('admin.requests.edit', compact('priorities','tipologiesRelations','typologies'));
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

    public function findSectorBrigade(Request $request){

        if(!$request->ajax()){
            abort(403);
        }
        
        $colony=Colony::findOrFail($request->get('colony'));
        $sectorNumber=$colony->sector->number;
        $sector=$colony->sector;
        $brigades=$sector->brigades()
                         ->join('brigade_typology','brigades.id','=','brigade_typology.brigade_id')
                         ->join('typologies','typologies.id','=','brigade_typology.typology_id')
                         //->where('brigade_sector.is_default_brigade','=',true)
                         ->where('typologies.id','=',$request->get('typology'))
                         ->orderBy('brigade_sector.is_default_brigade','desc')
                         ->lists('brigades.name','brigades.id');

        $html="";
        foreach ($brigades as $key => $value) {
            $html.="<option value=".$key." > ".$value." </option>\n";
        }

        $data=[
                'sector' => $sectorNumber,
                'brigades' => $html
            ];
        return response()->Json($data);
    }
}