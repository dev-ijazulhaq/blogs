<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function createRoleAssignPermission(array $attributes)
    {
        $role = $this->create(['name' => $attributes['name'], 'guard_name' => $attributes['guard_name']]);

        if (!empty($attributes['permissions'])) {
            $role->syncPermissions($attributes['permissions']);
        }

        return $role;
    }

    public function findOrFailWithPermissions(string|int $id)
    {
        $roles = Role::with('permissions')->findOrFail($id);
        return $roles;
    }

    public function updateRoleWithPermissions(array $attributes, string|int $id)
    {
        $role = $this->findOrFail($id);
        $role->update(['name' => $attributes['name'], 'guard_name' => $attributes['guard_name']]);
        $role->syncPermissions($attributes['permissions']);
        return $role;
    }
}
