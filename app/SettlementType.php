<?php

namespace App;

use App\Colony;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;

class SettlementType extends Model {

	use SimpleSearchableTables;

	protected $fillable=['name'];

	protected $searchable=['name'];

	public function Colonies() {
		
		return $this->hasMany(Colony::class);
	}

	
}
