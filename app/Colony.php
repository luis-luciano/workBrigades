<?php

namespace App;

use App\ColonyScope;
use App\PersonalInformation;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use App\Request as Petition;
use App\SettlementType;
use Illuminate\Database\Eloquent\Model;

class Colony extends Model {

	use SimpleSearchableTables;

	protected $fillable=['zip','name'];

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

		return $this->hasMany(PersonalInformation::class);
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
}