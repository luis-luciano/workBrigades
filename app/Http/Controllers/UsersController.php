<?php

namespace App\Http\Controllers;

use App\Colony;
use App\Http\Requests;
use App\Http\Requests\StoreUserRequest;
use App\PersonalInformation;
use App\Role;
use App\User;
use Illuminate\Http\Request;



class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // 113
    {
        auth()->user()->authorized(113) ?  : abort(403);

        $users=User::SearchFromRequest()->PaginateForTable();
        
       return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //114
    {
        auth()->user()->authorized(114) ?  : abort(403);

        $roles = Role::lists('label', 'id');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request) //115
    {
        auth()->user()->authorized(115) ?  : abort(403);

        $user_data=PersonalInformation::create($request->all());

        $user = User::create($request->all());

        //dd($user);
        
        $user->personalInformation()->associate(PersonalInformation::find($user_data->id))->save();
        
        $user->syncRoles($request->roles_list);

        alert()->success(trans('messages.success.store'));

        return redirect()->route('users.edit', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //116
    {
        auth()->user()->authorized(116) ?  : abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //117
    {
        auth()->user()->authorized(117) ?  : abort(403);

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
    public function update(Request $request, $id) // 118
    {
        auth()->user()->authorized(118) ?  : abort(403);

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
    public function destroy($id) //119
    {
        auth()->user()->authorized(119) ?  : abort(403);

        return redirect()->route('users.index');
    }
}
