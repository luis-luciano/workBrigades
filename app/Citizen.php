<?php

namespace App;

use App\Presenters\CitizenPresenter;
use App\Traits\HasPersonalInformation;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use McCool\LaravelAutoPresenter\HasPresenter;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model implements HasPresenter {

	use HasPersonalInformation, SimpleSearchableTables;

	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
	protected $fillable=['email'];

	/**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['personalInformation'];


	public function requests() 
	{
		return $this->morphMany('App\Request','concerned');
	}

	// public function personalInformation()
 //    {
 //        return $this->belongsTo('App\PersonalInformation');
 //    }
 
 	public function scopeSearch(Builder $query, $search)
    {
        $relationsToLoad = ['personalInformation', 'personalInformation.colony'];

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

            $query->orWhereHas('personalInformation.colony', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                    $query->orWhere('zip', 'like', "%{$search}%");
                });
            });
        })
            ->with($relationsToLoad);

        return $query;
    }

 	public function getPresenterClass()
 	{
 		return CitizenPresenter::class;
 	}
}