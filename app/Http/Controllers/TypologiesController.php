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
        auth()->user()->authorized(106) ?  : abort(403);

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
        auth()->user()->authorized(107) ?  : abort(403);

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
        auth()->user()->authorized(108) ?  : abort(403);

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
        auth()->user()->authorized(109) ?  : abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //110
    {
        auth()->user()->authorized(110) ?  : abort(403);

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
    public function update(TypologyRequest $request, $id) //111
    {
        auth()->user()->authorized(111) ?  : abort(403);

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
    public function destroy($id) //112
    {
        auth()->user()->authorized(112) ?  : abort(403);

        $typology=Typology::find($id);
        
        $typology->delete();
        
        return redirect('typologies');
    }
}
