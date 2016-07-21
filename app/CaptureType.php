<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;

class CaptureType extends Model
{
	use SimpleSearchableTables;

    protected $fillable=['name','color'];

    protected $searchable=['name'];

    public function requests(){
    	return $this->hasMany('App\Request');
    }
}