<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Inquiry;
use App\RequestLocation;
use App\Http\Requests;
use App\Http\Requests\LocationRequest;

class RequestLocationController extends Controller
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

    public function updateOrStore(LocationRequest $request, Inquiry $inquiry)
    {
        $this->authorize('creator', $inquiry);
        
        if (is_null($inquiry->location)) {
            RequestLocation::create($request->all())->request()->save($inquiry);
        } else {
            $inquiry->location()->update($request->all());
        }

        alert()->success(trans('messages.success.update'));

        return redirect(route('requests.edit', compact('inquiry')).'#tab_geolocation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inquiry $inquiry)
    {
        $this->authorize('creator', $inquiry);

        $inquiry->location->delete();

        alert()->success(trans('messages.success.destroy'));

        return redirect(route('requests.edit', compact('inquiry')).'#tab_geolocation');
    }
}
