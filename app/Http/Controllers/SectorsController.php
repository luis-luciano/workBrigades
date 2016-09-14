<?php

namespace App\Http\Controllers;

use App\Brigade;
use App\Http\Requests;
use App\Http\Requests\SectorRequest;
use App\Sector;
use App\Typology;
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
        $this->authorize('index.sectors');

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
        $this->authorize('create.sectors');

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
        $this->authorize('store.sectors');

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
        $this->authorize('show.sectors');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //89
    {   
        $this->authorize('edit.sectors');

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
        $this->authorize('update.sectors');

        dd($request->all());

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
        $this->authorize('destroy.sectors');

        $sector=Sector::find($id);

        $sector->delete();

        return redirect('sectors');
    }
}
