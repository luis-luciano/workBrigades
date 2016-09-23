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
        $this->authorize('index.settlement_types');
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
        $this->authorize('create.settlement_types');

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
        $this->authorize('store.settlement_types');

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
        $this->authorize('show.settlement_types');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($settlement) //96 
    {
        $this->authorize('edit.settlement_types');

        return view('admin.settlementTypes.edit', compact('settlement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettlementTypeRequest $request, $settlement) //97
    {
        $this->authorize('update.settlement_types');

        $settlement->update($request->all());

        return redirect('colonies/settlement-types/' . $settlement->id .'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($settlement) //98
    {
        $this->authorize('destroy.settlement_types');

        $settlement->delete();

        return redirect('colonies/settlement-types/');
    }
}
