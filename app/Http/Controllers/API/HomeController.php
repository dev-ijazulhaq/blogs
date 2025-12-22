<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
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

    public function apiHomeScreen()
    {
        $blogs = $this->blogService->apiHomeScreen();
        return Response::success(BlogResource::collection($blogs), 'Blogs fetched successfully..');
    }
}
