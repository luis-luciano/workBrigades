<?php

namespace App;

use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Activity extends Model 
{
	use SoftDeletes;
	
	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


	public function user() 
	{
		return $this->belongsTo(User::class); //correct
	}

	public function roles() 
	{
		return $this->belongsToMany(Role::class);
	}
}
