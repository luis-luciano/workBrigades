<?php

namespace App\Http\Controllers;

use App\Colony;
use App\ColonyScope;
use App\Http\Requests;
use App\SettlementType;
use Illuminate\Http\Request;

class ColoniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colonies=Colony::all();
        $scopes=ColonyScope::all('id','name');
        $settlements=SettlementType::all('id','name');
       //return $settlementType;
       //dd($colonies);
        return  view('admin.colonies.index',compact('colonies','scopes','settlements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
             $scopes=ColonyScope::lists('name','id');
            $settlements=SettlementType::lists('name', 'id');
            return view ('admin.colonies.create', compact('scopes','settlements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->colony_scope_id+1;
        $colony=Colony::create($request->all());
        $colony->colonyScopes()->associate(ColonyScope::find($request->colony_scope_id))->save();
        $colony->settlementTypes()->associate(SettlementType::find($request->settlement_type_id))->save();
        return redirect()->route('colonies.index');
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colony=Colony::find($id);
        //return $colony;
        $scopes=ColonyScope::lists('name','id');
        $settlements=SettlementType::lists('name', 'id');
        //return $scopes;
        return view('admin.colonies.show', compact('colony','scopes','settlements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colony=Colony::find($id);
        return $colony;
        return view('admin.colonies.edit', compact('colony'));
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
        $colony=Colony::find($id);
        $colony->update($request->all());
        $colony->colonyScopes()->associate(ColonyScope::find($request->colony_scope_id))->save();
        $colony->settlementTypes()->associate(SettlementType::find($request->settlement_type_id))->save();
        return redirect('colonies/' . $colony->id );
        return $colony;
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colony=Colony::find($id);
        $colony->delete();

        return redirect('colonies');
    }
}
