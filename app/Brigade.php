<?php

namespace App;

use App\Request as Petition;
use App\Sector;
use Illuminate\Database\Eloquent\Model;

class Brigade extends Model {

	protected $fillable=['name','description'];
	//
	public function requests() {

		return $this->hasMany(Petition::class);
	}

	public function sectors() {
		
		return $this->belongsToMany(Sector::class);
	}

	public function typologies(){
		return $this->belongsToMany('App\Typology');
	}
}