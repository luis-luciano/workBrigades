<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RequestStateRequest;
use App\RequestState;
use Illuminate\Http\Request;

class RequestStatesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // 64
    {
        auth()->user()->authorized(64) ?  : abort(403);

        $states=RequestState::SearchFromRequest()->PaginateForTable();

        return view('admin.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // 65
    {
        auth()->user()->authorized(65) ?  : abort(403);

        return view('admin.states.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStateRequest $request) //66
    {
        auth()->user()->authorized(67) ?  : abort(403);

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
    public function show($id) //67
    {
        auth()->user()->authorized(67) ?  : abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //68
    {
        auth()->user()->authorized(68) ?  : abort(403);

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
    public function update(RequestStateRequest $request, $id) //69
    {
        auth()->user()->authorized(69) ?  : abort(403);

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
    public function destroy($id) //70
    {
        auth()->user()->authorized(70) ?  : abort(403);

        $state=RequestState::find($id);
        
        $state->delete();
        
        alert()->success(trans('messages.success.destroy'));
        
        return redirect('requestsStates');
    }
}
