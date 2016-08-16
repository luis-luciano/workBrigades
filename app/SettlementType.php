<?php

namespace App;

use App\Colony;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;


class SettlementType extends Model {

	use SimpleSearchableTables, SoftDeletes;

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
	protected $fillable=['name'];

	protected $searchable=['name'];

	public function Colonies() {
		
		return $this->hasMany(Colony::class);
	}

	
}
