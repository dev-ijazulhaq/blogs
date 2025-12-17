<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;
    /**
     * Create a new class instance.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): LengthAwarePaginator
    {
        return $this->model->orderByDESC('id')->paginate(5);
    }

    public function find(string|int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function findOrFail(string|int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, string|int $id): Model
    {
        $record = $this->model->findOrFail($id);
        $record->update($attributes);
        return $record->fresh();
    }

    public function delete(string|int $id): bool
    {
        $record = $this->model->findOrFail($id);
        return $record->delete();
    }

    public function enableOrDisable(int $status, int $id): Model
    {
        $record = $this->model->findOrFail($id);
        $record->update(['status' => $status]);
        return $record->fresh();
    }
}
