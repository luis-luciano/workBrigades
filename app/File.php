<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class File extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at']; 

    public function filable()
    {
        return $this->morphTo();
    }

	// public function owner()
    // {
    //  return $this->belongsTo('App\User','user_id');
    // }

    public function creator()
    {
        return $this->morphTo();
    }

    public function getExtensionAttribute()
    {
    	return pathinfo($this->name,PATHINFO_EXTENSION);
    }

    public function getTypeAttribute()
    {
    	if(in_array($this->extension,['jpeg', 'jpg', 'png'])){
    		return 'image';
    	}

    	return 'document';
    }

    public static function fromForm(UploadedFile $uploadedFile, $id, $path)
    {
        if ($uploadedFile->isValid()) {
            $uploadedFileExtension = strtolower($uploadedFile->getClientOriginalExtension());
            $uploadedFileName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);

            $fileName = $id.'_'.str_random(40).'.'.$uploadedFileExtension;

            $uploadedFile->move(storage_path($path), $fileName);

            $file = new static;
            $file->name = $fileName;
            $file->display_name = $uploadedFileName;
            $file->display_name = $uploadedFileName;
             //$file->user_id = auth()->user()->id;
                
            return $file;
        }

        return;
    }

    public static function checkUpload($file, $callback = null)
    {
        if (!is_null($file)) {

            // check if a callback was given
            $callback = is_callable($callback) ? $callback : function () {};
            $callback();

            //for fileinput purpose
            return response()->json([]);
        }
        //for fileinput purpose
        return response()->json(['error' => 'Ha ocurrido un error al subir el archivo']);
    }

    public function fromDiskIfIsRelatedTo($disk, $concerned)
    {
        //$this->isRelatedTo($concerned);

        return $this->fromDisk($disk, $this->name);
    }

    public static function fromDisk($disk, $fileName)
    {
        $storage = Storage::disk($disk);

        $content = $storage->get($fileName);
        $type = $storage->mimeType($fileName);

        return response($content, '200')->header('Content-Type', $type);
    }
}