<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\TypologyRequest;
use App\Supervision;
use App\Typology;
use Illuminate\Http\Request;

class TypologiesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //106
    {
        $this->authorize('index.typologies');

        $typologies=Typology::SearchFromRequest()->PaginateForTable();

        return view('admin.typologies.index', compact('typologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //107
    {
        $this->authorize('create.typologies');

        return view('admin.typologies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypologyRequest $request) //108
    {
        $this->authorize('store.typologies');

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
    public function show($id) // 109
    {
        $this->authorize('show.typologies');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($typology) //110
    {
        $this->authorize('edit.typologies');

        return view('admin.typologies.edit', compact('typology','supervisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypologyRequest $request, $typology) //111
    {
        $this->authorize('update.typologies');

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
    public function destroy($typology) //112
    {
        $this->authorize('destroy.typologies');
        
        $typology->delete();
        
        return redirect('typologies');
    }
}
