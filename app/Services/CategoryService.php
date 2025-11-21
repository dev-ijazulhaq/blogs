<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService
{
    protected CategoryRepositoryInterface $category;
    /**
     * Create a new class instance.
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function create(array $attributes): Category
    {
        return $this->category->create($attributes);
    }
}
