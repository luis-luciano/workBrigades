<?php

namespace App\Http\Controllers;

use App\CaptureType;
use App\Http\Requests;
use App\Http\Requests\CaptureTypeRequest;
use Illuminate\Http\Request;

class CaptureTypesController extends Controller
{   
    public function __construct() {
        $this->middleware('auth', ['only' => ['index','create','store','show', 'edit','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $captureTypes=CaptureType::SearchFromRequest()->PaginateForTable();
        
        return view('admin.captureTypes.index', compact('captureTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.captureTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CaptureTypeRequest $request)
    {
        $captureType=CaptureType::create($request->all());
        
        alert()->success(trans('messages.success.store'));

        return redirect('captureTypes');
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
        $captureType=CaptureType::find($id);
        
        return view('admin.captureTypes.edit',compact('captureType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CaptureTypeRequest $request, $id)
    {
        $captureType=CaptureType::find($id);
        
        $captureType->update($request->all());

        alert()->success(trans('messages.success.update'));
        
        return redirect('captureTypes/' . $captureType->id .'/edit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $captureType=CaptureType::find($id);

        $captureType->delete();

        alert()->success(trans('messages.success.destroy'));
        
        return redirect('captureTypes');
    }
}
