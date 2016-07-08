<?php

namespace App;

use App\Activity;
use App\PersonalInformation;
use App\Request as Petition;
use App\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = [
		'email', 'password','sub_email','is_active'
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $hidden = [
		'password', 'remember_token',
	];

	public function personalInformation() {
		return $this->belongsTo(PersonalInformation::class); //correct
	}

	public function syncRoles($roles)
    {
        return $this->roles()->sync($roles ?: []);
    }

    public function getRolesListAttribute()
    {
        return $this->roles->lists('id')->toArray();
    }

	public function activities() {
		return $this->hasMany(Activity::class); //correct
	}

	public function requests() {
		return $this->belongsToMany(Petition::class);
	}

	public function roles() {
		return $this->belongsToMany(Role::class);
	}

	public function belongsToSupervisions()
    {
        return $this->belongsToMany(Supervision::class)->withTimestamps();
    }
}