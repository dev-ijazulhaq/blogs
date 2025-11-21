<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }

    public function  getAllPermissions()
    {
        $permissions = Permission::all();
        return $permissions;
    }
}
