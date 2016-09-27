<?php

namespace App\Http\Controllers;

use App\Request as Inquiry;
use App\RequestReply;
use Illuminate\Http\Request;

use App\Http\Requests;

class RequestReplyRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    public function updateOrStore(Request $request, Inquiry $inquiry)
    {
        $request['who_last_edited_id'] = auth()->user()->id;

        if (is_null($inquiry->reply)) {
            RequestReply::create($request->all())->request()->save($inquiry);
            $inquiry->changeStateTo('in_process_with_answer');
        } else {
            $inquiry->reply()->update($request->all());
        }

        alert()->success(trans('messages.success.update'));

        return redirect(route('requests.edit', compact('inquiry')).'#tab_reply');
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
