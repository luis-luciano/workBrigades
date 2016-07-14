<?php

namespace App;

use App\Colony;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;

class ColonyScope extends Model {

	use SimpleSearchableTables;

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
