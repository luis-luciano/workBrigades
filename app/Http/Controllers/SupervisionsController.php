<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SupervisionRequest;
use App\Supervision;
use App\User;
use Illuminate\Http\Request;

class SupervisionsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // 99
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
        $users = User::with('personalInformation')
            ->get()
            ->lists('full_name', 'id')->toArray();
        $supervisions = optionalCollection(Supervision::lists('name', 'id'));

        return view('admin.supervisions.create', compact('users','supervisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupervisionRequest $request)
    {

            $supervision = Supervision::create($request->all());

            $supervision->syncMembers($request->members_list);
            
        return redirect()->route('supervisions.edit', compact('supervision'));
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
        $users = User::with('personalInformation')
            ->get()
            ->lists('full_name', 'id');

        $supervisions = optionalCollection(Supervision::where('id', '!=', $supervision->id)->orderBy('name', 'asc')->lists('name', 'id'));

        return view('admin.supervisions.edit', compact('supervision', 'users', 'supervisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupervisionRequest $request, $id)
    {
        $supervision=Supervision::find($id);

        $supervision->update($request->all());

        $supervision->syncMembers($request->members_list);

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
