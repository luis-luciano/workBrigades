<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ProblemRequest;
use App\Problem;
use App\Typology;
use Illuminate\Http\Request;

class ProblemTypesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // 43
    {
        auth()->user()->authorized(43) ?  : abort(403);

        $problemTypes = Problem::SearchFromRequest()->PaginateForTable();

        return view('admin.problemTypes.index', compact('problemTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // 44
    {
        auth()->user()->authorized(44) ?  : abort(403);

        $typologies=Typology::lists('name','id');

        return view('admin.problemTypes.create', compact('typologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProblemRequest $request) //45
    {   
        auth()->user()->authorized(45) ?  : abort(403);

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
    public function show($id) //46
    {
        auth()->user()->authorized(46) ?  : abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // 47
    {
        auth()->user()->authorized(47) ?  : abort(403);

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
    public function update(ProblemRequest $request, $id) // 48
    {
        auth()->user()->authorized(48) ?  : abort(403);

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
    public function destroy($id) // 49
    {
        auth()->user()->authorized(49) ?  : abort(403);

        $problemType=Problem::find($id);

        $problemType->delete();

        return redirect('problemTypes');
    }
}