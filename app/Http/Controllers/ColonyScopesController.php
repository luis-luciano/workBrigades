<?php

namespace App\Http\Controllers;
use App\ColonyScope;
use App\Http\Requests;
use App\Http\Requests\ScopesRequest;
use Illuminate\Http\Request;

class ColonyScopesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scopes=ColonyScope::SearchFromRequest()->PaginateForTable();
        return view('admin.colonyScopes.index', compact('scopes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colonyScopes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $scope=ColonyScope::create($request->all());
        return redirect('colonies/scopes');
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
        $scope=ColonyScope::find($id);
        return view('admin.colonyScopes.edit',compact('scope'));
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
        $scope=ColonyScope::find($id);
        $scope->update($request->all());
         return redirect('colonies/scopes/' . $scope->id .'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scope=ColonyScope::find($id);
        $scope->delete();

        return redirect('colonies/scopes');
    }
}
