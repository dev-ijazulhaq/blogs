<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function all(): Collection;
    public function find(string|int $id): ?Model;
    public function findOrFail(string|int $id): Model;
    public function create(array $attributes): Model;
    public function update(array $attributes, string|int $id): Model;
    public function delete(string|int $id): bool;
    public function enableOrDisable(string|int $status, string|int $id): Model;
}
