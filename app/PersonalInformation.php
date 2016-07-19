<?php

namespace App;

use App\Colony;
use App\Request;
use Carbon\Carbon;
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
        'fax',
        'street',
        'number',
        'interior',
        'profession',
        'colony_id',
    ];

	public function user() {
		return $this->hasOne(Request::class);
	}

    public function citizen()
    {
        return $this->hasOne('App\Citizen');
    }

	public function colony() {
		return $this->belongsTo(Colony::class);
	}

    public function getBirthdayAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }
}