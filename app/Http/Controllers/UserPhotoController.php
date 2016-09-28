<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\File;
use App\User;
use Auth;

class UserPhotoController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    public function showProfilePhoto()
    {
        return File::fromDisk(User::$diskName, auth()->user()->photo->name);
    }

    public function editProfilePhoto()
    {
        $user = auth()->user()->load('photo');

        $photos = collect([]);
        $photo['src'] = route('users.profiles.photos.show');
        $photo['w'] = 964;
        $photo['h'] = 1024;
        $photo['title'] = $user->photo->display_name.'<br> por '.$user->photo->creator->full_name;
        $photos->push($photo);

        return view('admin.users.profiles.edit', compact('user', 'photos'));
    }

    public function updateProfilePhoto(Request $request)
    {
        alert()->success(trans('messages.success.update'));

        return $this->uploadPhoto($request, auth()->user());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return File::fromDisk(User::$diskName, $user->photo->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        return $this->uploadPhoto($request, $user);
    }

    private function uploadPhoto(Request $request, User $user)
    {
        $photo = File::fromForm($request->file('file'), $user->id, User::$uploadsPath);

        return File::checkUpload($photo, function () use ($user, $photo) {
            $photo->creator()->associate($user)->save();
            $user->updatePhoto($photo);
        });
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyProfilePhoto()
    {
        auth()->user()->deletePhoto();

        alert()->success(trans('messages.success.destroy'));

        return redirect()->route('users.profiles.index');
    }
}
