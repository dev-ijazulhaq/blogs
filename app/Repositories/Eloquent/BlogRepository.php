<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use App\Models\Category;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(Blog $model)
    {
        parent::__construct($model);
    }

    public function blogsAndCategoriesByUser(int $userId): array
    {
        $blogs = $this->model->where('user_id', $userId)->with(['user', 'category:id,name'])->latest()->get();
        $categories = Category::all();
        return [
            'blogs' => $blogs,
            'categories' => $categories
        ];
    }
}
