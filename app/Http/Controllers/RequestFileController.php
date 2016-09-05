<?php

namespace App\Http\Controllers;


use App\Request as Inquiry;
use App\File;
use Illuminate\Http\Request;
use App\Http\Requests\DeleteFileRequest;

use App\Http\Requests;

class RequestFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Inquiry $inquiry)
    {
        $this->authorize('creator', $inquiry);

        return $this->uploadFile($request,$inquiry);
    }

    private function uploadFile(Request $request, Inquiry $inquiry)
    {
        $file = File::fromForm($request->file('file'), $inquiry->id, Inquiry::$uploadsPath);

        //alert()->success(trans('messages.success.store'));

        return File::checkUpload($file, function () use ($inquiry, $file) {
            $inquiry->addFile($file);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inquiry $inquiry, File $file)
    {
        return $file->fromDiskIfIsRelatedTo(Inquiry::$diskName, $inquiry);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteFileRequest $request,Inquiry $inquiry, File $file)
    {
        $this->authorize($file);

        //$file->isRelatedTo($inquiry);

        $file->delete();

        return response()->json(['status' => 'Complete']);
    }
}
