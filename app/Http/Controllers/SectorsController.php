<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SectorRequest;
use App\Sector;
use Illuminate\Http\Request;

class SectorsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // 85
    {
        auth()->user()->authorized(85) ?  : abort(403);

        $sectors=Sector::SearchFromRequest()->PaginateForTable();

        return view('admin.sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //86
    {
        auth()->user()->authorized(86) ?  : abort(403);

        return view('admin.sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectorRequest $request) //87
    {
        auth()->user()->authorized(87) ?  : abort(403);

        $sector=Sector::create($request->all());

        return redirect('sectors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //88
    {
        auth()->user()->authorized(88) ?  : abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //89
    {   
        auth()->user()->authorized(89) ?  : abort(403);

        $sector=Sector::find($id);

        return view('admin.sectors.edit',compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectorRequest $request, $id) //90
    {
        auth()->user()->authorized(91) ?  : abort(403);

        $sector=Sector::find($id);

        $sector->update($request->all());

        return redirect('sectors/' . $sector->id .'/edit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //91
    {
        auth()->user()->authorized(91) ?  : abort(403);

        $sector=Sector::find($id);

        $sector->delete();

        return redirect('sectors');
    }
}
