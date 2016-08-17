<?php

namespace App;

use App\Request as Petition;
use App\RequestType;
use App\Typology;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Problem extends Model {

	use SimpleSearchableTables, SoftDeletes;

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	protected $fillable=['name'];

	public function requests() 
	{
		return $this->hasMany(Petition::class);
	}
	
	public function typology() 
	{
		return $this->belongsTo('App\Typology','typology_id');
	}

	public function scopeSearch(Builder $query,$search){

    	$query->where(function($query) use($search){
    			$query->where('name', 'like', "%{$search}%");

    		  	$query->orWhereHas('typology',function($query) use ($search){
    		  		$query->where('name', 'like', "%{$search}%");
    		  	});
    		  	
    	});

    	return $query;
    }
}