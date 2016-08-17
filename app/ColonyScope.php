<?php

namespace App;

use App\Colony;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;


class ColonyScope extends Model {

	use SimpleSearchableTables, SoftDeletes;

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	protected $fillable=['name'];

	public function colonies() {
		
		return $this->hasMany(Colony::class);
	}

	public function scopeSearch(Builder $query,$search){

    	$query->where(function($query) use($search){
    			$query->where('name', 'like', "%{$search}%");
    	});
    	return $query;
    }
}
