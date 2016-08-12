<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestRejection extends Model
{
	protected $fillable=['justification'];

    public function requests()
    {
    	return $this->hasMany('App\Request');
    }
}
