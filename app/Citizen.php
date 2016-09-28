<?php

namespace App;

use App\Presenters\CitizenPresenter;
use App\Traits\HasPersonalInformation;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use McCool\LaravelAutoPresenter\HasPresenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Citizen extends Model implements HasPresenter {

	use HasPersonalInformation, SimpleSearchableTables, SoftDeletes;

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
    
	  protected $fillable = ['email', 'personal_information_id'];

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

	public function requestsCreated()
    {
        return $this->morphMany('App\Request','creator');
    }

     public function filesCreated()
    {
        return $this->morphMany('App\File','creator');
    }

    public function scopeSearchByNames(Builder $query, $names)
    {
        $names = is_array($names) ? $names : [$names];

        return $query->whereHas('personalInformation', function ($query) use ($names) {
            $query->where(function ($query) use ($names) {
                foreach ($names as $word) {
                    $query->where('name', 'like', "%{$word}%");
                    $query->orWhere('paternal_surname', 'like', "%{$word}%");
                    $query->orWhere('maternal_surname', 'like', "%{$word}%");
                }
            });
        })->with(['personalInformation' => function ($query) {
            $query->select(['id', 'name', 'paternal_surname', 'maternal_surname', 'colony_id']);
        }, 'personalInformation.colony' => function ($query) {
            $query->select(['id', 'name']);
        }]);
    }
 
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