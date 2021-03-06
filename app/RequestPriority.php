<?php

namespace App;

use App\Request as Petition;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes; 

class RequestPriority extends Model {
	
	use SimpleSearchableTables, SoftDeletes; 

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at']; 
	
	protected $fillable=['name','color'];

	protected $searchable=['name'];
	
	public function requests() {

		return $this->hasMany(Petition::class);
	}
}
