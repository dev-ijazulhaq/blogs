<?php

namespace App\Services;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\Permission\Models\Role;

class RoleService
{
    protected RoleRepositoryInterface $role;
    /**
     * Create a new class instance.
     */
    public function __construct(RoleRepositoryInterface $role)
    {
        $this->role = $role;
    }

    public function all(): LengthAwarePaginator
    {
        return $this->role->all();
    }

    public function create(array $attributes): Role
    {
        return $this->role->createRoleAssignPermission($attributes);
    }

    public function getRole(string|int $id): Role
    {
        return $this->role->findOrFailWithPermissions($id);
    }

    public function update(array $attributes, string|int $id): Role
    {
        return $this->role->updateRoleWithPermissions($attributes, $id);
    }

    public function delete(string|int $id): bool
    {
        return $this->role->delete($id);
    }
}
