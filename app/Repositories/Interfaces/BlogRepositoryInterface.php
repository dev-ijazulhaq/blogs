<?php

namespace App\Repositories\Interfaces;

use App\Models\Blog;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface BlogRepositoryInterface extends BaseRepositoryInterface
{
    public function blogsAndCategoriesByUser($user): array;
    public function actionOnBlog(string|int $status, string|int $id);
    public function homeScreenBlogs(): Collection;
    public function blogTitles();
    public function blogsPage();
}
