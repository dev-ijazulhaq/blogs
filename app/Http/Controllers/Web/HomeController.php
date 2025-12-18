<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\Request;

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
        return view('pages.web.index', compact('blogs'));
    }

    public function blogDetails(Blog $blog)
    {
        $recentTitles = $this->blogService->blogTitles();
        return view('pages.web.blog', compact('blog', 'recentTitles'));
    }

    public function blogsPage()
    {
        $blogs = $this->blogService->blogsPage();
        return view('pages.web.blogs', compact('blogs'));
    }
}
