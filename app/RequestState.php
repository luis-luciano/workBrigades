<?php

namespace App;

use App\Request as Petition;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;

class RequestState extends Model {

	use SimpleSearchableTables;
	
	protected $fillable = ['name','label','color'];

	protected $searchable=['label'];

	public function requests() {
		return $this->hasMany(Petition::class);
	}
}