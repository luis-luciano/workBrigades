<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Supervision;
use Illuminate\Http\Request;

class SupervisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisions=Supervision::SearchFromRequest()->PaginateForTable();
        return view('admin.supervisions.index', compact('supervisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supervisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $supervision = new Supervision;
            $supervision->name = $request->name;
            $supervision->phone = $request->phone;
            $supervision->extension = $request->extension;
            $supervision->user_id= 1;
            $supervision->supervisions_id=1;
            $supervision->save();
        return redirect('supervisions');
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
        $supervision=Supervision::find($id);
        //dd($supervision);
        return view('admin.supervisions.edit',compact('supervision'));
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
        $supervision=Supervision::find($id);
        $supervision->update($request->all());

        return redirect('supervisions/' . $supervision->id .'/edit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supervision=Supervision::find($id);
        $supervision->delete();
        return redirect('supervisions');
    }
}
