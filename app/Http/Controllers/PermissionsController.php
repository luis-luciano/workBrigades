<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // 36
    {
        $this->authorize('index.permissions');

        $permissions = Permission::SearchFromRequest()->PaginateForTable();

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //37
    {
        $this->authorize('create.permissions');

        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // 38
    {
        $this->authorize('store.permissions');

         $permission = Permission::create($request->all());

        return redirect()->route('permissions.edit', compact('permission'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // 39
    {
        $this->authorize('show.permissions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($permission) // 40
    {
        $this->authorize('edit.permissions');

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permission) // 41
    {
        $this->authorize('update.permissions'); 

        $permission->update($request->all());

        return redirect()->route('permissions.edit', compact('permission'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($permission) // 42
    {
        $this->authorize('destroy.permissions');

        $permission->delete();
        
        return redirect()->route('permissions.index');
    }
}
