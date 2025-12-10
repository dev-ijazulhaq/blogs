<?php

namespace App\Services;

use App\Jobs\SendNewCategoryPublishedJob;
use App\Models\Category;
use App\Models\User;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Traits\HandleImage;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    use HandleImage;
    protected CategoryRepositoryInterface $category;
    /**
     * Create a new class instance.
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function all(): LengthAwarePaginator
    {
        return $this->category->all();
    }

    public function create(array $attributes): Category
    {
        $storeImage = $this->imageUploading($attributes['image'], 'categories');
        $data = [
            'name' => $attributes['name'],
            'image' => $storeImage,
        ];
        $category = $this->category->create($data);
        try {
            $users = User::all();
            foreach ($users as $user) {
                dispatch(new SendNewCategoryPublishedJob($user->email, $attributes['name']));
            }
            return $category;
        } catch (\Throwable $th) {
            report($th);
            throw $th;
        }
    }

    public function getCategory(string $id): Category
    {
        return $this->category->findOrFail($id);
    }

    public function updateCategory(array $attributes, string $id)
    {

        if (isset($attributes['image'])) {
            $updateImage = $this->imageUpdate($attributes['image'], $attributes['oldImage'], 'categories');
            $requestData = [
                'name' => $attributes['name'],
                'image' => $updateImage
            ];
        } else {
            $requestData = [
                'name' => $attributes['name'],
                'image' => $attributes['oldImage']
            ];
        }
        return $this->category->update($requestData, $id);
    }

    public function deleteCategory(string $id)
    {
        $category = $this->category->findOrFail($id);
        if ($category->image) {
            $this->deleteImage($category->image, 'categories');
        }
        return $this->category->delete($id);
    }
}
