<?php

namespace App;

use App\Colony;
use Illuminate\Database\Eloquent\Model;

class SettlementType extends Model {

	protected $fillable=['name'];

	public function Colonies() {
		
		return $this->hasMany(Colony::class);
	}
}
