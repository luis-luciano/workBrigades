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
        auth()->user()->authorized(30) ?  : abort(403);

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
        auth()->user()->authorized(30) ?  : abort(403);

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
        auth()->user()->authorized(31) ?  : abort(403);

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
        auth()->user()->authorized(32) ?  : abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // 33
    {
        auth()->user()->authorized(33) ?  : abort(403);

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
    public function update(ColonyScopeRequest $request, $id) // 34
    {
        auth()->user()->authorized(34) ?  : abort(403);

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
    public function destroy($id) // 35
    {
        auth()->user()->authorized(35) ?  : abort(403);

        $scope=ColonyScope::find($id);

        $scope->delete();

        return redirect('colonies/scopes');
    }
}
