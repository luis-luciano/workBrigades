<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Supervision;
use App\Typology;
use Illuminate\Http\Request;

class TypologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typologies=Typology::paginate(5);

        return view('admin.typologies.index', compact('typologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typologies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typology=Typology::create($request->all());
        $typology->syncSupervisions($request->supervisions_list);

        alert()->success(trans('messages.success.store'));
        return redirect('typologies');
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
        $typology=Typology::find($id);
        return view('admin.typologies.edit', compact('typology','supervisions'));
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
        $typology=Typology::find($id);
        $typology->update($request->all());
        $typology->syncSupervisions($request->supervisions_list);
        return redirect('typologies/'.$typology->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typology=Typology::find($id);
        $typology->delete();
        return redirect('typologies');
    }
}
