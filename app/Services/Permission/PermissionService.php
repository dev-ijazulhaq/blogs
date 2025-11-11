<?php

namespace App\Services\Permission;

use App\Repositories\Interfaces\PermissionRepositoryInterface;

class PermissionService
{
    protected $permissionInterface;
    /**
     * Create a new class instance.
     */
    public function __construct(PermissionRepositoryInterface $permission_interface)
    {
        $this->permissionInterface = $permission_interface;
    }

    public function getAll()
    {
        return $this->permissionInterface->getAll();
    }

    public function storePermission(array $data)
    {
        return $this->permissionInterface->storePermission($data);
    }

    public function getPermission(string $id)
    {
        return $this->permissionInterface->getPermission($id);
    }

    public function updatePermission(array $data, string $id)
    {
        return $this->permissionInterface->updatePermission($data, $id);
    }

    public function destroyPermission(string $id)
    {
        return $this->permissionInterface->destroyPermission($id);
    }
}
