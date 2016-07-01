<?php


namespace App\Http\Controllers;

use App\Brigade;
use App\Colony;
use App\Http\Requests;
use App\ProblemType;
use App\SettlementType;
use App\Supervision;
use App\Typology;
use App\RequestPriority;
use Carbon\Carbon;
use App\Sector;
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
        $prueba=Typology::with('problemTypes','supervisions')->get(['id','name']);
        $typologies=Typology::lists('name','id');
        $problemType=ProblemType::lists('name', 'id');
        $supervicion=Supervision::lists('name', 'id');
        $date = Carbon::now();
        $date = $date->format('l jS \\of F Y h:i:s A');
        $brigades=Brigade::lists('name', 'id');
        return view('requests.index',compact('typologies', 'problemType', 'supervicion','date', 'brigades','prueba'));
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
        $problemTypes=ProblemType::lists('name', 'id');
        $brigades=Brigade::lists('name', 'id');
        $prueba=Typology::with('problemTypes','supervisions')->get(['id','name'])->toJson();
        $sectors=Sector::lists('number', 'id');
        return view('admin.requests.create', compact('priorities','typologies','problemTypes','prueba','brigades','sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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