<?php

namespace App\Http\Controllers;
use App\ColonyScope;
use App\Http\Requests;
use App\Http\Requests\ColonyScopeRequest;
use App\Http\Requests\ScopesRequest;
use Illuminate\Http\Request;

class ColonyScopesController extends Controller
{   
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // 29
    {
        $this->authorize('index.colony_scopes');

        $scopes=ColonyScope::SearchFromRequest()->PaginateForTable();

        return view('admin.colonyScopes.index', compact('scopes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // 30
    {
        $this->authorize('create.colony_scopes');

        return view('admin.colonyScopes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColonyScopeRequest $request) // 31
    {
        $this->authorize('store.colony_scopes');

        $scope=ColonyScope::create($request->all());

        return redirect('colonies/scopes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // 32
    {
        $this->authorize('show.colony_scopes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($scope) // 33
    { 
        $this->authorize('edit.colony_scopes');

        return view('admin.colonyScopes.edit',compact('scope'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColonyScopeRequest $request, $scope) // 34
    {
        $this->authorize('update.colony_scopes');
        
        $scope->update($request->all());

         return redirect('colonies/scopes/' . $scope->id .'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($scope) // 35
    {
        $this->authorize('destroy.colony_scopes');

        $scope->delete();

        return redirect('colonies/scopes');
    }
}
