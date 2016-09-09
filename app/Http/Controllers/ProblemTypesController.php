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
        $this->authorize('index.problem_types');

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
        $this->authorize('create.problem_types');

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
        $this->authorize('store.problem_types');

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
        $this->authorize('show.problem_types');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // 47
    {
        $this->authorize('edit.problem_types');

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
        $this->authorize('update.problem_types');

        $problemType=Problem::find($id);
        

        $problemType->update($request->all());

        $problemType->typology()->associate(Typology::find($request->typology_id))->save();

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
        $this->authorize('destroy.problem_types');

        $problemType=Problem::find($id);

        $problemType->delete();

        return redirect('problemTypes');
    }
}