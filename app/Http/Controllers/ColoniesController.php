<?php

namespace App\Http\Controllers;

use App\Colony;
use App\ColonyScope;
use App\Http\Requests;
use App\Http\Requests\ColonyRequest;
use App\PersonalInformation;
use App\Sector;
use App\SettlementType;
use Illuminate\Http\Request;

class ColoniesController extends Controller
{   
    public function __construct() {
        $this->middleware('auth', ['only' => ['create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //22
    {
        $this->authorize('index.colonies');

        $colonies=Colony::SearchFromRequest()->PaginateForTable();
        
        return  view('admin.colonies.index',compact('colonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // 23
    {
            $this->authorize('create.colonies');

            $scopes=ColonyScope::lists('name','id');
            
            $settlements=SettlementType::lists('name', 'id');
            
            $sectors=Sector::lists('number','id');
            
            return view ('admin.colonies.create', compact('scopes','settlements','sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColonyRequest $request) //24
    {
        $this->authorize('store.colonies');

        $colony=Colony::create($request->all());
        
        $colony->colonyScope()->associate(ColonyScope::find($request->colony_scope_id))->save();
        
        $colony->settlementType()->associate(SettlementType::find($request->settlement_type_id))->save();
        
        $colony->sector()->associate(Sector::find($request->sector_id))->save();

        alert()->success(trans('messages.success.store'));
        
        return redirect()->route('colonies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // 25
    {
        $this->authorize('show.colonies');

        $colony=Colony::find($id);
        
        $scopes=ColonyScope::lists('name','id');
        
        $settlements=SettlementType::lists('name', 'id');
        
        $i=$colony->personalInformation()->count();
        
        return view('admin.colonies.show', compact('colony','scopes','settlements','i'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($colony) // 26
    { 
        $this->authorize('edit.colonies');

        $scopes=ColonyScope::lists('name','id');
        
        $settlements=SettlementType::lists('name', 'id');
        
        $sectors=Sector::lists('number','id');

        return view('admin.colonies.edit', compact('colony','scopes','settlements','sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColonyRequest $request, $colony) // 27
    {
        $this->authorize('update.colonies');

        $colony->update($request->all());
        
        $colony->colonyScope()->associate(ColonyScope::find($request->colony_scope_id))->save();
        
        $colony->settlementType()->associate(SettlementType::find($request->settlement_type_id))->save();
        
        $colony->sector()->associate(Sector::find($request->sector_id))->save();

        alert()->success(trans('messages.success.update'));

        return redirect('colonies/' . $colony->id .'/edit');
        
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($colony) // 28
    {
        $this->authorize('destroy.colonies');
        
        $colony->delete();

        alert()->success(trans('messages.success.destroy'));

        return redirect('colonies');
    }
}
