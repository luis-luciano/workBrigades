<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SettlementTypeRequest;
use App\SettlementType;
use Illuminate\Http\Request;

class SettlementTypesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //92
    {   
        auth()->user()->authorized(92) ?  : abort(403);
        $settlements=SettlementType::SearchFromRequest()->PaginateForTable();;
        return view('admin.settlementTypes.index', compact('settlements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //93
    {
        auth()->user()->authorized(93) ?  : abort(403);

        return view('admin.settlementTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettlementTypeRequest $request) //94
    {
        auth()->user()->authorized(94) ?  : abort(403);

        $settlement=SettlementType::create($request->all());

        return redirect()->route('colonies.settlement-types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //95
    {
        auth()->user()->authorized(95) ?  : abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //96 
    {
        auth()->user()->authorized(96) ?  : abort(403);

        $settlement=SettlementType::find($id);

        return view('admin.settlementTypes.edit', compact('settlement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettlementTypeRequest $request, $id) //97
    {
        auth()->user()->authorized(97) ?  : abort(403);

        $settlement=SettlementType::find($id);

        $settlement->update($request->all());

        return redirect('colonies/settlement-types/' . $settlement->id .'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //98
    {
        auth()->user()->authorized(98) ?  : abort(403);

        $settlement=SettlementType::find($id);

        $settlement->delete();

        return redirect('colonies/settlement-types/');
    }
}
