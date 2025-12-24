<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogDetailResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BlogCollectionResource;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    protected BlogService $blogService;

    public function __construct(BlogService $blog_service)
    {
        $this->blogService = $blog_service;
    }

    public function homeScreenBlogs()
    {
        $blogs = $this->blogService->homeScreenBlogs();
        return Response::success(BlogResource::collection($blogs), 'Blogs fetched successfully..');
    }

    public function blogs()
    {
        $blogs = $this->blogService->blogsPage();
        return Response::success(BlogResource::collection($blogs), 'Blogs fetched successfully..');
    }

    public function blogDetails($blogId)
    {
        $blog = $this->blogService->blogDetails($blogId);
        return Response::success(new BlogDetailResource($blog['blogDetails']), 'Successfully get a blog..');
    }
}
