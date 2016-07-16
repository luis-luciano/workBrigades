<?php

namespace App;

use App\Request as Petition;
use App\Sector;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;


class Brigade extends Model {

	use SimpleSearchableTables;

	protected $fillable=['name','description'];

	protected $searchable=['name','description'];
	//
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

	public function defaultSector(){
		return $this->belongsTo('App\Sector');
	}
}