<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes; 

class RequestType extends Model {

	use SimpleSearchableTables, SoftDeletes;  

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	protected $fillable = ['name', 'color'];

	protected $searchable=['name'];
	
	public function requests() 
	{
		return $this->hasMany('App\Request');
	}

	public function problems() 
	{
		return $this->hasMany('App\Problem');
	}
}