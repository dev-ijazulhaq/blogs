<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function getAll()
    {
        return Permission::all();
    }

    public function storePermission(array $data)
    {
        return Permission::create($data);
    }

    public function getPermission(string $id)
    {
        return Permission::findOrFail($id);
    }

    public function updatePermission(array $data, string $id)
    {
        $permission = Permission::find($id);
        $permission->update($data);
        return $permission;
    }

    public function destroyPermission(string $id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return $permission;
    }
}
