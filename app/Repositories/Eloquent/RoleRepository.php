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
}
