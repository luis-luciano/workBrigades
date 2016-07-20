<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{

	public function owner()
	{
		return $this->belongsTo('App\User','user_id');
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
}