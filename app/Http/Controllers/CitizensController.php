<?php

namespace App\Http\Controllers;

use App\Citizen;
use App\Colony;
use App\Http\Requests\StoreCitizenRequest;
use App\PersonalInformation;
use Illuminate\Http\Request;

class CitizensController extends Controller
{   
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // 15
    {
        auth()->user()->authorized(15) ?  : abort(403); 
        $citizens=Citizen::SearchFromRequest()->PaginateForTable();

        return view('admin.citizens.index',compact('citizens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //16
    {
        auth()->user()->authorized(16) ?  : abort(403);

        return view('admin.citizens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCitizenRequest $request) // 17
    {
        auth()->user()->authorized(17) ?  : abort(403);

        $citizen = PersonalInformation::create($request->all())->citizen()->create($request->all());

        alert()->success(trans('messages.success.store'));

        return redirect()->route('citizens.edit', compact('citizen'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //18
    {
        auth()->user()->authorized(1) ?  : abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Citizen $citizen) // 19
    {
        auth()->user()->authorized(19) ?  : abort(403);

        return view('admin.citizens.edit', compact('citizen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citizen $citizen) // 20
    {
        auth()->user()->authorized(20) ?  : abort(403);

        $citizen->update($request->all());
        
        $citizen->personalInformation()->update($request->all());

        alert()->success(trans('messages.success.update'));
        
        return redirect()->route('citizens.edit', compact('citizen'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // 21 
    {
        auth()->user()->authorized(21) ?  : abort(403);

        /*alert()->success(trans('messages.success.destroy'));*/
    }
}
