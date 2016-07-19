<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ProblemRequest;
use App\Problem;
use App\Typology;
use Illuminate\Http\Request;

class ProblemTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problemTypes = Problem::SearchFromRequest()->PaginateForTable();
        return view('admin.problemTypes.index', compact('problemTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typologies=Typology::lists('name','id');
        return view('admin.problemTypes.create', compact('typologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProblemRequest $request)
    {   
        $problemType=Problem::create($request->all());
        $problemType->typologies()->associate(Typology::find($request->typology_id))->save();
        return redirect('problemTypes');
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
        $problemType=Problem::find($id);
        $typologies=Typology::lists('name','id');
        return view('admin.problemTypes.edit',compact('problemType','typologies'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProblemRequest $request, $id)
    {
        $problemType=Problem::find($id);
        $problemType->update($request->all());
        $problemType->typologies()->associate(Typology::find($request->typology_id))->save();
        return redirect('problemTypes/'.$problemType->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $problemType=Problem::find($id);
        $problemType->delete();
        return redirect('problemTypes');
    }
}
