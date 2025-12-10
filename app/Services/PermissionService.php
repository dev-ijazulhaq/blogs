<?php

namespace App\Services;

use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\Permission\Models\Permission;

class PermissionService
{
    protected PermissionRepositoryInterface $permission;
    /**
     * Create a new class instance.
     */
    public function __construct(PermissionRepositoryInterface $permission)
    {
        $this->permission = $permission;
    }

    public function all(): LengthAwarePaginator
    {
        return $this->permission->all();
    }

    public function create(array $attributes): Permission
    {
        return $this->permission->create($attributes);
    }

    public function getPermission(string|int $id): Permission
    {
        return $this->permission->findOrFail($id);
    }

    public function update(array $attributes, string|int $id): Permission
    {
        return $this->permission->update($attributes, $id);
    }

    public function delete(string|int $id): bool
    {
        return $this->permission->delete($id);
    }

    public function getAllPermissions()
    {
        return $this->permission->getAllPermissions();
    }
}
