<?php

namespace App;

use App\Problem;
use App\Supervision;
use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
	protected $fillable=['name'];

    public function problems() {
    	
		return $this->hasMany(Problem::class);
	}

	public function supervisions(){
		return $this->belongsToMany(Supervision::class)->withTimestamps();
	}

	public function brigades(){
		return $this->belongsToMany('App\Brigade');
	}
}