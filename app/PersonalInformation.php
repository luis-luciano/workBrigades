<?php

namespace App;

use App\Colony;
use App\Request;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model {

	protected $fillable = [
        'name',
        'paternal_surname',
        'maternal_surname',
        'sex',
        'birthday',
        'represent',
        'house_phone',
        'mobile_phone',
        'street',
        'number',
        'interior',
        'profession',
        'colony_id',
    ];

	public function users() {
		return $this->hasOne(Request::class);
	}

	public function colony() {
		return $this->belongsTo(Colony::class);
	}
}