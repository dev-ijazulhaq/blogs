<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface BlogRepositoryInterface extends BaseRepositoryInterface
{
    public function blogsAndCategoriesByUser($user): array;
    public function actionOnBlog(string|int $status, string|int $id);
}
