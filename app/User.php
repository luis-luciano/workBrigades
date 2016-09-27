<?php

namespace App;

use App\Activity;
use App\PersonalInformation;
use App\Request as Petition;
use App\Role;
use App\File;
use App\Traits\HasPersonalInformation;
use Illuminate\Foundation\Auth\User as Authenticatable;
use McCool\LaravelAutoPresenter\HasPresenter;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\HasRoles;


class User extends Authenticatable 
{

	use HasPersonalInformation, SimpleSearchableTables, HasRoles, SoftDeletes;

	public static $diskName = 'users_photos';

    public static $uploadsPath = 'uploads/users_photos';

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
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

	protected $with = ['personalInformation'];

	public function requestsCreated()
    {
        return $this->morphMany('App\Request','creator');
    }

    public function fileCreated()
    {
        return $this->morphMany('App\File','creator');
    }

    public function setDefaultPhoto()
    {
        $file = new File;
        $file->name = 'default.jpg';
        $file->display_name = 'Default';

        $this->photo()->save($file);
        $this->photo->creator()->associate($this)->save();
    }

    public function updatePhoto($photo)
    {
        //delete current photo
        $this->photo->delete();

        //update current photo
        return $this->photo()->save($photo);
    }

    public function photo()
    {
        return $this->morphOne('App\File', 'filable');
    }

    public function replies()
    {
        return $this->hasMany('App\RequestReply', 'who_last_edited_id');
    }

    public function comments()
    {
        return $this->hasMany(RequestComment::class);
    }

	public function personalInformation() 
	{
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

	public function activities() 
	{
		return $this->hasMany(Activity::class); //correct
	}

	public function requests() 
	{
		return $this->belongsToMany(Petition::class);
	}

	// public function roles() {
	// 	return $this->belongsToMany(Role::class);
	// }

	// public function permissions()
	// {
	// 	$permissions= array();
 //        foreach (auth()->user()->rolesList as $role) {
 //            $permissions= array_merge( Role::find($role)->permissionslistId, $permissions);
 //        }
	// 	return $permissions;
	// }

	// public function authorized($key)
	// {
	// 	return in_array ( $key , auth()->user()->permissions());
	// }

	public function getSupervisionsIdAttribute()
	{
		 return $this->supervisionsInCharge->merge($this->belongsToSupervisions)->unique()->pluck('id')->toArray();
	}

	public function belongsToSupervisions()
    {
        return $this->belongsToMany(Supervision::class)->withTimestamps();
    }

	// public function supervision()
 //    {
 //        return $this->hasMany(Supervision::class);
 //    }

    public function supervisionsInCharge()
    {
        return $this->hasMany(Supervision::class);
    }

    // public function supervisions()
    // {
    //     return $this->belongsToMany(Supervision::class)->withTimestamps();
    // }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function scopeSearch(Builder $query, $search)
    {
        $relationsToLoad = ['personalInformation'];

        $query->where(function ($query) use ($search) {
            $query->where('email', 'like', "%{$search}%");

            $query->orWhereHas('personalInformation', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                    $query->orWhere('paternal_surname', 'like', "%{$search}%");
                    $query->orWhere('maternal_surname', 'like', "%{$search}%");
                    $query->orWhere('house_phone', 'like', "%{$search}%");
                    $query->orWhere('mobile_phone', 'like', "%{$search}%");
                });
            });

            
        })
            ->with($relationsToLoad);

        return $query;
    }

 //    public function getHasRoleAttribute($value)
	// {
	// 	return in_array($value,$this->roles->lists('name','id')->toArray());
	// }
}