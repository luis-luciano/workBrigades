<?php

namespace App;

use App\Request as Petition;
use Illuminate\Database\Eloquent\Model;

class RequestPriority extends Model {
	
	protected $fillable=['name','color'];
	
	public function requests() {

		return $this->hasMany(Petition::class);
	}
}
