<?php

namespace App;

use App\ColonyScope;
use App\PersonalInformation;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use App\Request as Petition;
use App\SettlementType;
use App\Presenters\CitizenPresenter;
use McCool\LaravelAutoPresenter\HasPresenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Colony extends Model implements hasPresenter{

	use SimpleSearchableTables, SoftDeletes;
	
	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	protected $fillable = ['zip', 'name', 'colony_scope_id', 'settlement_type_id'];


	public function requests() {

		return $this->hasMany(Petition::class);
	}

	public function settlementType() {

		return $this->belongsTo('App\SettlementType','settlement_type_id');
	}

	public function colonyScope() {

		return $this->belongsTo('App\ColonyScope','colony_scope_id');
	}
	
	public function personalInformation() {

		return $this->hasOne(PersonalInformation::class);
	}

	public function sector(){
		return $this->belongsTo('App\Sector');
	}
	
	public function getNameWithZipAttribute()
    {
        return $this->name.' ('.$this->zip.')';
    }

    public function scopeSearch(Builder $query,$search){

    	$query->where(function($query) use($search){
    			$query->where('name', 'like', "%{$search}%")
    		  		  ->orWhere('zip', 'like', "%{$search}%");

    		  	$query->orWhereHas('sector',function($query) use ($search){
    		  		$query->where('number','=',$search);
    		  	});
    		  	$query->orWhereHas('colonyScope', function ($query) use ($search) {
                	$query->where(function ($query) use ($search) {
	                    $query->where('name', 'like', "%{$search}%");
	                });
	            });
	            $query->orWhereHas('settlementType', function ($query) use ($search) {
                	$query->where(function ($query) use ($search) {
	                    $query->where('name', 'like', "%{$search}%");
	                });
	            });
    	});

    	return $query;
    }

    public function getPresenterClass()
    {
    	return CitizenPresenter::class;
    }
}