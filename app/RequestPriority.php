<?php

namespace App;

use App\Request as Petition;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;

class RequestPriority extends Model {
	
	use SimpleSearchableTables;
	
	protected $fillable=['name','color'];

	protected $searchable=['name'];
	
	public function requests() {

		return $this->hasMany(Petition::class);
	}
}
