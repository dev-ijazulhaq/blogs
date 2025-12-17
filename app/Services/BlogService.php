<?php

namespace App\Services;

use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Traits\HandleImage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class BlogService
{
    use HandleImage;
    protected BlogRepositoryInterface $blogInterface;
    /**
     * Create a new class instance.
     */
    public function __construct(BlogRepositoryInterface $blogInterface)
    {
        $this->blogInterface = $blogInterface;
    }

    public function all()
    {
        return $this->blogInterface->blogsAndCategoriesByUser(Auth::id());
    }

    public function create(array $attributes)
    {
        $uploadImg = $this->imageUploading($attributes['image'], 'Blogs');
        $requestData = [
            'user_id' => Auth::id(),
            'title' => $attributes['title'],
            'description' => $attributes['description'],
            'category_id' => $attributes['category_id'],
            'image' => $uploadImg,
        ];
        return $this->blogInterface->create($requestData);
    }

    public function getBlog(string|int $id)
    {
        return $this->blogInterface->findOrFail($id);
    }

    public function updateBlog(array $attributes, string|int $id)
    {
        if (isset($attributes['image'])) {
            $imageName = $this->imageUpdate($attributes['image'], $attributes['oldImg'], 'Blogs');
            $requestData = [
                'title' => $attributes['title'],
                'description' => $attributes['description'],
                'image' => $imageName,
                'category_id' => $attributes['category_id'],
            ];
        } else {
            $requestData = [
                'title' => $attributes['title'],
                'description' => $attributes['description'],
                'category_id' => $attributes['category_id'],
            ];
        }
        return $this->blogInterface->update($requestData, $id);
    }

    public function deleteBlog(string|int $id)
    {
        $blog = $this->blogInterface->findOrFail($id);
        if ($blog->image) {
            $this->deleteImage($blog->image, 'Blogs');
        }

        return $this->blogInterface->delete($id);
    }
}
