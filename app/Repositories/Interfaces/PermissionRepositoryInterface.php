<?php

namespace App\Repositories\Interfaces;

interface PermissionRepositoryInterface
{
    public function getAll();
    public function storePermission(array $data);
    public function getPermission(string $id);
    public function updatePermission(array $data, string $id);
    public function destroyPermission(string $id);
}
