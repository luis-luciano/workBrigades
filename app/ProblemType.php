<?php

namespace App;

use App\Request as Petition;
use App\RequestType;
use App\Typology;
use Illuminate\Database\Eloquent\Model;

class ProblemType extends Model {
	public function requests() {
		return $this->hasMany(Petition::class);
	}
	public function typologies() {
		return $this->belongsTo(Typology::class);
	}
}
