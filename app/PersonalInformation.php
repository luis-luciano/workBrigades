<?php

namespace App;

use App\Colony;
use App\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PersonalInformation extends Model {
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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