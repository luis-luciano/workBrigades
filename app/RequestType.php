<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;


class RequestType extends Model {

	use SimpleSearchableTables;

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