<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * Create a new class instance.
     */

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
}
