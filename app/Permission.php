<?php

namespace App;

use App\Role;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;


class Permission extends Model {

		use SimpleSearchableTables;

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