<?php

namespace App\Http\Controllers;

use App\Colony;
use App\Http\Requests;
use App\PersonalInformation;
use App\Role;
use App\User;
use Illuminate\Http\Request;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::paginate(10);
       return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('label', 'id');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user_data=PersonalInformation::create($request->all());
        // $user = User::create($request->all());
        // $user->personalInformation()->associate(PersonalInformation::find($user_data->id))->save();

        $user = PersonalInformation::create($request->all())->user()->create($request->all());
        $user->syncRoles($request->roles_list);

        // alert()->success(trans('messages.success.store'));

        return redirect()->route('users.edit', compact('user'));
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
        $user=User::find($id);
        $user->load('personalInformation');

        $roles = Role::lists('label', 'id');
        $colonies = Colony::lists('name', 'id');

        return view('admin.users.edit', compact('user', 'roles', 'colonies'));
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
        if (empty($request['password'])) {
            unset($request['password']);
        }
        $user=User::find($id);
        $user->update($request->all());

        $user->personalInformation()->update($request->all());

        $user->syncRoles($request->roles_list);

        alert()->success(trans('messages.success.update'));

        return redirect()->route('users.edit', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        return redirect()->route('users.index');
    }
}
