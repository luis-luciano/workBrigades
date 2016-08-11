<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RoleRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //78
    {
        auth()->user()->authorized(78) ?  : abort(403);

        $roles=Role::SearchFromRequest()->PaginateForTable();
        
        //return $permissions;
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // 79
    {
        auth()->user()->authorized(79) ?  : abort(403);

        $permissions=Permission::lists('label','id');

        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request) //80
    {
        auth()->user()->authorized(80) ?  : abort(403); 

        $role=Role::create($request->all());

        $role->syncPermissions($request->permissions_list);

        alert()->success(trans('messages.success.store'));

        return redirect('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //81
    {
        auth()->user()->authorized(81) ?  : abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //82
    {
        auth()->user()->authorized(82) ?  : abort(403);

        $role=Role::find($id);

        $permissions=Permission::lists('label','id');

        return view('admin.roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id) //83
    {
        auth()->user()->authorized(83) ?  : abort(403);

        $role=Role::find($id);

        $role->update($request->all());

        $role->syncPermissions($request->permissions_list);

        alert()->success(trans('messages.success.update'));

        return redirect('roles/' . $role->id .'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //84
    {
        auth()->user()->authorized(84) ?  : abort(403);

        $role=Role::find($id);

        $role->permissions()->detach();

        $role->delete();

        alert()->success(trans('messages.success.destroy'));

        return redirect('roles');
    }
}
