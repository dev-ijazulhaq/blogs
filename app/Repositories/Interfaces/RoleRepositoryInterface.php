<?php

namespace App\Repositories\Interfaces;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
    //
    public function createRoleAssignPermission(array $attributes);
    public function findOrFailWithPermissions(string|int $id);
    public function updateRoleWithPermissions(array $attributes, string|int $id);
    public function getAllRoles();
}
