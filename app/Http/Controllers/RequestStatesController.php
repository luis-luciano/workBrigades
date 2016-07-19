<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RequestStateRequest;
use App\RequestState;
use Illuminate\Http\Request;

class RequestStatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states=RequestState::SearchFromRequest()->PaginateForTable();
        return view('admin.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.states.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStateRequest $request)
    {
        $state=RequestState::create($request->all());

        alert()->success(trans('messages.success.store'));

        return redirect('requestsStates');
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
        $state=RequestState::find($id);
        return view('admin.states.edit',compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStateRequest $request, $id)
    {
        $state=RequestState::find($id);
        $state->update($request->all());

        alert()->success(trans('messages.success.update'));
        return redirect('requestsStates/' . $state->id .'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state=RequestState::find($id);
        $state->delete();
        alert()->success(trans('messages.success.destroy'));
        return redirect('requestsStates');
    }
}
