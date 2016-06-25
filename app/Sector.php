<?php

namespace App;

use App\Brigade;
use App\Request as Petition;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model {

	protected $fillable=['number'];

	public function requests() {
		return $this->hasMany(Petition::class);
	}

	public function brigades() {
		return $this->belongsToMany(Brigade::class);
	}
}
