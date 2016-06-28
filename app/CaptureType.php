<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaptureType extends Model
{
    protected $fillable=['name','color'];

    public function requests(){
    	return $this->hasMany('App\Requests');
    }
}