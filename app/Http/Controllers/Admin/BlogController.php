<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\UpdateBlog;
use App\Models\Blog;
use App\Services\BlogService;
use App\Traits\ControllerResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use AuthorizesRequests, ValidatesRequests, ControllerResponse;
    protected BlogService $blogService;
    /**
     * Display a listing of the resource.
     */
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        return view('pages.admin.blogs', [
            'userBlogs' => $this->blogService->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $this->authorize('create', Blog::class);
        try {
            $storeBlog = $this->blogService->create($request->validated());
            return $this->successResponse('Blog successfully create', $storeBlog, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Blog insertion failed', $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $this->authorize('view', $blog);
        try {
            return $this->successResponse('Blog successfully get', $blog, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Failed to get blog', $th->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlog $request, Blog $blog)
    {
        $this->authorize('update', $blog);
        try {
            $updateBlog = $this->blogService->updateBlog($request->validated(), $blog->id);
            return $this->successResponse('Blog successfully updated', $updateBlog, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Updating blog failed', $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);
        try {
            $delete = $this->blogService->deleteBlog($blog->id);
            return $this->successResponse('Blog is successfully deleted', $delete, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Blog deleting failed..!', $th->getMessage(), 500);
        }
    }
}
