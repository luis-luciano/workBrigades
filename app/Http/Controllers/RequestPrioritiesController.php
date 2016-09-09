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
        $this->authorize('index.request_priorities');

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
        $this->authorize('create.request_priorities');

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
        $this->authorize('store.request_priorities');

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
        $this->authorize('show.request_priorities');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // 54
    {
        $this->authorize('edit.request_priorities');

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
        $this->authorize('update.request_priorities');

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
        $this->authorize('destroy.request_priorities');

        $priority=RequestPriority::find($id);

        $priority->delete();

        return redirect('requestsPriorities');
    }
}
