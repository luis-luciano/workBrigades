<?php

namespace App\Http\Controllers;

use App\Brigade;
use App\Http\Requests\BrigadesRequest;
use App\Sector;
use App\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrigadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brigades=Brigade::SearchFromRequest()->PaginateForTable();
        return view('admin.brigades.index', compact('brigades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typologies=Typology::lists('name','id');
        $sectors=Sector::lists('number','id');
        return view ('admin.brigades.create',compact('typologies','sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrigadesRequest $request)
    {   
        //dd($request->typologies_list);
        $brigade=Brigade::create($request->all());
        $brigade->syncTypologies($request->typologies_list);

        return redirect()->route('brigades.index');
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
        $brigade=Brigade::find($id);
        $typologies=Typology::lists('name','id');
        $sectors=Sector::lists('number','id');
        return view('admin.brigades.edit', compact('brigade','typologies','sectors'));
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
        $brigade=Brigade::find($id);
        $brigade->update($request->all());
        $brigade->syncTypologies($request->typologies_list);
        $brigade->syncSectors($request->sectors_list);
        return redirect('brigades/' . $brigade->id .'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brigade=Brigade::find($id);
        $brigade->delete();

        return redirect('brigades');
    }
}
