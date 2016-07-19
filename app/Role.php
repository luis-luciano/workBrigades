<?php

namespace App;

use App\Permission;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;

class Role extends Model {

	use SimpleSearchableTables;

	protected $fillable=['name','label','home'];

    protected $searchable=['name','label'];

	public function users() {
		return $this->belongsToMany(User::class);
	}
	public function permissions() {
		return $this->belongsToMany(Permission::class);
	}

	/**
     * Grant the given permission to a role.
     *
     * @param  Permission $permission
     * @return mixed
     */
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

    /**
     * Grant the given permissions to a role.
     *
     * @param  mixed $permissions
     * @return mixed
     */
    public function syncPermissions($permissions)
    {
        return $this->permissions()->sync($permissions ?: []);
    }

    public function getPermissionsListAttribute()
    {
        return $this->permissions->lists('id')->toArray();
    }
}
