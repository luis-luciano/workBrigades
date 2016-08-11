<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RequestPriorityRequest;
use App\RequestPriority;
use Illuminate\Http\Request;

class RequestPrioritiesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // 50
    {
        auth()->user()->authorized(50) ?  : abort(403);

        $priorities=RequestPriority::SearchFromRequest()->PaginateForTable();

        return view('admin.priorities.index', compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //51
    {
        auth()->user()->authorized(51) ?  : abort(403);

        return view('admin.priorities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestPriorityRequest $request) //52
    {
        auth()->user()->authorized(52) ?  : abort(403);

        $priority=RequestPriority::create($request->all());

        return redirect('requestsPriorities');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //53
    {
        auth()->user()->authorized(53) ?  : abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // 54
    {
        auth()->user()->authorized(54) ?  : abort(403);

        $priority=RequestPriority::find($id);

        return view('admin.priorities.edit',compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestPriorityRequest $request, $id) // 55
    {
        auth()->user()->authorized(55) ?  : abort(403);

        $priority=RequestPriority::find($id);

        $priority->update($request->all());

        return redirect('requestsPriorities/' . $priority->id .'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // 56
    {
        auth()->user()->authorized(56) ?  : abort(403);

        $priority=RequestPriority::find($id);

        $priority->delete();

        return redirect('requestsPriorities');
    }
}
