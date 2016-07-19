<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RequestPriorityRequest;
use App\RequestPriority;
use Illuminate\Http\Request;

class RequestPrioritiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities=RequestPriority::SearchFromRequest()->PaginateForTable();
        return view('admin.priorities.index', compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.priorities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestPriorityRequest $request)
    {
        $priority=RequestPriority::create($request->all());
        return redirect('requestsPriorities');
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
    public function update(RequestPriorityRequest $request, $id)
    {
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
    public function destroy($id)
    {
        $priority=RequestPriority::find($id);
        $priority->delete();
        return redirect('requestsPriorities');
    }
}
