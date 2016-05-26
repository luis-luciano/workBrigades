<?php

namespace App;

use App\Request as Petition;
use App\RequestType;
use App\Typology;
use Illuminate\Database\Eloquent\Model;

class ProblemType extends Model {

	protected $fillable=['name'];

	public function requests() {
		return $this->hasMany(Petition::class);
	}
	
	public function typologies() {
		return $this->belongsTo('App\Typology','typology_id');
	}
}
