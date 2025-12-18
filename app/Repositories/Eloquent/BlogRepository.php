<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use App\Models\Category;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(Blog $model)
    {
        parent::__construct($model);
    }

    public function blogsAndCategoriesByUser($user): array
    {
        $query = $this->model->with(['user', 'category:id,name'])->latest();
        if (! $user->roles->name = 'Super Admin') {
            $query->where('user_id', $user->id);
        }
        $categories = Category::all();
        return [
            'blogs' => $query->get(),
            'categories' => $categories
        ];
    }

    public function actionOnBlog(string|int $status, string|int $id)
    {
        $blog = $this->model->findOrFail($id);
        $blog->update(['is_publish' => $status]);
        return $blog;
    }

    public function homeScreenBlogs(): Collection
    {
        return $this->model->published()
            ->with(['user:id,name', 'category:id,name'])
            ->limit(6)
            ->latest()
            ->get();
    }

    public function blogTitles()
    {
        return $this->model->published()
            ->select(['id', 'title'])
            ->latest()
            ->limit(6)
            ->get();
    }
}
