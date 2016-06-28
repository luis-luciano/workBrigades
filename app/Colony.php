<?php

namespace App;

use App\ColonyScope;
use App\PersonalInformation;
use App\Request as Petition;
use App\SettlementType;
use Illuminate\Database\Eloquent\Model;

class Colony extends Model {

	protected $fillable=['zip','name'];

	public function requests() {

		return $this->hasMany(Petition::class);
	}

	public function settlementTypes() {

		return $this->belongsTo('App\SettlementType','settlement_type_id');
	}

	public function colonyScopes() {

		return $this->belongsTo('App\ColonyScope','colony_scope_id');
	}
	
	public function personalInformation() {

		return $this->hasMany(PersonalInformation::class);
	}

	public function sector(){
		return $this->belongsTo('App\Sector');
	}
}