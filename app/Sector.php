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

	public function brigades()
	{
		return $this->belongsToMany('App\Brigade')->withTimestamps();
	}

	public function colonies()
	{
		return $this->hasMany('App\Colony');
	}
}