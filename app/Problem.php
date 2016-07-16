<?php

namespace App;

use App\Request as Petition;
use App\RequestType;
use App\Typology;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model {

	use SimpleSearchableTables;

	protected $fillable=['name'];

	public function requests() {
		return $this->hasMany(Petition::class);
	}
	
	public function typologies() {
		return $this->belongsTo('App\Typology','typology_id');
	}

	public function scopeSearch(Builder $query,$search){

    	$query->where(function($query) use($search){
    			$query->where('name', 'like', "%{$search}%");

    		  	$query->orWhereHas('typologies',function($query) use ($search){
    		  		$query->where('name', 'like', "%{$search}%");
    		  	});
    		  	
    	});

    	return $query;
    }

}
