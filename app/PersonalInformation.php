<?php

namespace App;

use App\Colony;
use App\Request;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model {

	public function users() {
		return $this->hasOne(Request::class);
	}

	public function colony() {
		return $this->belongsTo(Colony::class);
	}
}