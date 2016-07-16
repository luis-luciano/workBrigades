<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\RequestType;
use Illuminate\Http\Request;

class RequestTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $requestTypes=RequestType::SearchFromRequest()->PaginateForTable();
        return view('admin.requestTypes.index',compact('requestTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.requestTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $Type=RequestType::create($request->all());

        alert()->success(trans('messages.success.store'));

        return redirect('requestTypes');

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
        
        $requestType=RequestType::find($id);

       return view('admin.requestTypes.edit',compact('requestType'));
    
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
        $requestType=RequestType::find($id);
        $requestType->update($request->all());

        alert()->success(trans('messages.success.update'));
        return redirect('requestTypes/' . $requestType->id .'/edit');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestType=RequestType::find($id);
        $requestType->delete();
        alert()->success(trans('messages.success.destroy'));
        
        return redirect('requestTypes/');
   
    }
}
