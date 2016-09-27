<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Request as Inquiry;
use App\RequestState;
use App\Supervision;
use App\Typology;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $requestStates=RequestState::lists('label','id');
        
        $supervisions=Supervision::lists('name','id');
        
        $states=RequestState::countByRequests();
       
        $typologies=Typology::all();
            
            $counters=array();
            
            foreach ($typologies as $typology) { 
                $counters[$typology->name]=Inquiry::countTypology($typology->id)->count();
            }
        //dd($counters);    
            $counters=json_encode($counters);
        
        $search = [
            'supervisions' => $request->get('supervisions', auth()->user()->supervisions_id),
            'date_range' => $request->get('date_range', ""),
        ];
        
        $inquirys = Inquiry::all();

        $supervisions_found=Supervision::find(auth()->user()->supervisions_id)->first();

        $requests =Inquiry::search($search)->get();
        
            $counters_requests=array();

            $request_state=RequestState::all();

            foreach ($request_state as $state) { 
                $counters_requests[$state->label]=$requests->where('request_state_id',$state->id)->count();
            }

            $card_counters=$counters_requests;
            //dd($counters_requests);
            $counters_requests=json_encode($counters_requests);

            //dd($card_counters);
        return view('admin.reports.index',compact('requests','requestStates','supervisions','typologies','counters','inquirys','states','counters_requests','supervisions_found','card_counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display a listing of the resource.
     *
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

        return view('admin.reports.prueba',compact('typologies','counters',''));

    }
}
