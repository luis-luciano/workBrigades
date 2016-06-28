<?php

namespace App;

use App\ProblemType;
use App\Supervision;
use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
	protected $fillable=['name'];

    public function problemTypes() {
    	
		return $this->hasMany(ProblemType::class);
	}

	public function supervisions(){
		return $this->belongsToMany(Supervision::class)->withTimestamps();
	}

	public function brigades(){
		return $this->belongsToMany('App\Brigade');
	}
}