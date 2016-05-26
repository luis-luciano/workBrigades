<?php

namespace App;

use App\ProblemType;
use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
	protected $fillable=['name'];

    public function problemTypes() {
    	
		return $this->hasMany('App\ProblemType');
	}
}