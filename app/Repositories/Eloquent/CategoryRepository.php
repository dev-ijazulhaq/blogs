<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * Create a new class instance.
     */

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getAllCategory(): Collection
    {
        return $this->model->orderByDESC('id')->get();
    }
}
