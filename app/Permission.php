<?php

namespace App;

use App\Role;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes; 



class Permission extends Model {

		use SimpleSearchableTables, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['label', 'name'];

    protected $searchable=['name','label'];

	public function roles() {
		return $this->belongsToMany(Role::class);
	}
}