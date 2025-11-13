<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function all(): LengthAwarePaginator;
    public function find(string|int $id): ?Model;
    public function findOrFail(string|int $id): Model;
    public function create(array $attributes): Model;
    public function update(array $attributes, string|int $id): Model;
    public function delete(string|int $id): bool;
    public function enableOrDisable(string|int $status, string|int $id): Model;
}
