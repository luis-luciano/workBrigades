<?php

namespace App\Http\Controllers;

use App\Citizen;
use App\Colony;
use App\Http\Requests;
use App\PersonalInformation;
use Illuminate\Http\Request;

class CitizensController extends Controller
{
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
    public function store(Request $request)
    {
        $citizen = PersonalInformation::create($request->all())->citizen()->create($request->all());

        //alert()->success(trans('messages.success.store'));

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
        //
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
        //
    }
}
