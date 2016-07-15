<?php

namespace App;

use App\Brigade;
use App\Request as Petition;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;

class Sector extends Model {

	use SimpleSearchableTables;

	protected $fillable=['number'];

	protected $searchable=['number'];

	public function requests() {
		return $this->hasMany(Petition::class);
	}

	public function brigades(){
		return $this->belongsToMany('App\Brigade')->withTimestamps();
	}

	public function colonies(){
		return $this->hasMany('App\Colony');
	}

	public function defaultBrigades(){
		return $this->hasMany('App\Brigade');
	}
}