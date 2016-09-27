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
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //1
    {
        $this->authorize('index.brigades');

        $brigades=Brigade::SearchFromRequest()->PaginateForTable();
        
        return view('admin.brigades.index', compact('brigades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // 2
    {
        $this->authorize('create.brigades');

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
    public function store(BrigadesRequest $request) // 3
    {   
        $this->authorize('store.brigades');
        
        //dd($request->all());

        $brigade=Brigade::create($request->all());

        if(isset($request->sectors_list_default)){
            foreach ($request->sectors_list_default as $sector) {
            $exist=Sector::find($sector)->brigadesByTypology()
                                            ->where('typology_id',$request->typology)
                                            ->where('sector_id',$sector)->count();
            //dd($exist);
            if ($exist == 0) {
                Sector::find($sector)->brigadesByTypology()->attach($brigade->id,['typology_id' => $request->typology]);
            }
        }
        }

        if(isset($request->typologies_list) && isset($request->sectors_list)){
            foreach ($request->typologies_list as $typology) {
            foreach ($request->sectors_list as $sector) {
                //Sector::find($sector)->brigadesByTypology()->attach($brigade->id,['typology_id' => $typology]);
                Sector::find($sector)->brigades()->attach($brigade->id,['typology_id' => $typology]);
            }
        }
        }

       
        
        //dd($brigade);
        alert()->success(trans('messages.success.store'));

        return redirect()->route('brigades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // 4
    {
        $this->authorize('show.brigades');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($brigade) // 5
    {
        $this->authorize('edit.brigades');
        
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
    public function update(BrigadesRequest $request, $brigade) // 6 
    {
        $this->authorize('update.brigades');
        
        $brigade->update($request->all());
        
        $brigade->syncTypologies($request->typologies_list);
        
        $brigade->syncSectors($request->sectors_list);

        alert()->success(trans('messages.success.update'));
        
        return redirect('brigades/' . $brigade->id .'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($brigade) // 7 
    {
        $this->authorize('destroy.brigades');

        $brigade->typologies()->detach();

        $brigade->sectors()->detach();
        
        $brigade->delete();
        
        alert()->success(trans('messages.success.destroy'));
        
        return redirect('brigades');
    }
}
