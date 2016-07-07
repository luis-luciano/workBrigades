<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\SettlementType;
use Illuminate\Http\Request;

class SettlementTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $settlements=SettlementType::paginate(5);
        return view('admin.settlementTypes.index', compact('settlements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settlementTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $settlement=SettlementType::create($request->all());
        return redirect()->route('colonies.settlement-types.index');
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
        $settlement=SettlementType::find($id);
       //return $settlement->Colonies()->count();
        return view('admin.settlementTypes.edit', compact('settlement'));
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
    public function destroy($id)
    {
         $settlement=SettlementType::find($id);
        $settlement->delete();

        return redirect('colonies/settlement-types/');
    }
}
