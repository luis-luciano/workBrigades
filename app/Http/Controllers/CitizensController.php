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
    public function index()
    {
        $citizens=Citizen::SearchFromRequest()->PaginateForTable();

        return view('admin.citizens.index',compact('citizens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.citizens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCitizenRequest $request)
    {
        $citizen = PersonalInformation::create($request->all())->citizen()->create($request->all());

        //$citizen->personalInformation->colony()->associate(Colony::find($request->get('colony_id')));

        //$citizen->save();

        alert()->success(trans('messages.success.store'));

        return redirect()->route('citizens.edit', compact('citizen'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Citizen $citizen)
    {
        return view('admin.citizens.edit', compact('citizen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citizen $citizen)
    {
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
    public function destroy($id)
    {
        /*alert()->success(trans('messages.success.destroy'));*/
    }
}
