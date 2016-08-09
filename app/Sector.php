<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;

class Sector extends Model {

	use SimpleSearchableTables;

	protected $fillable=['number'];

	protected $searchable=['number'];

	public function requests() 
	{
		return $this->hasMany('App\Sector');
	}

	public function colonies()
	{
		return $this->hasMany('App\Colony');
	}

	public function brigades()
	{
		return $this->belongsToMany('App\Brigade','sects_brigs_typs','sector_id','brigade_id','typology_id')->withTimestamps();
	}

	public function typologies()
	{
		return $this->belongsToMany('App\Typology','sects_brigs_typs','sector_id','brigade_id','typology_id')->withTimestamps();
	}

	public function brigadesByTypology()
	{
		return $this->belongsToMany('App\Brigade','brigades_default','sector_id','brigade_id','typology_id')->withTimestamps();
	}
}
