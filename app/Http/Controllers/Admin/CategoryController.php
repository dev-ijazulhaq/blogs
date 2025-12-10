<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use App\Traits\ControllerResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ControllerResponse;
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryService->all();
        return view('pages.admin.categories', compact('categories'));
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
    public function store(CategoryRequest $request)
    {
        try {
            $service = $this->categoryService->create($request->validated());
            return $this->successResponse('Category successfully created', $service, 201);
        } catch (\Throwable $th) {
            return $this->errorResponse('Category creating failed', $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $category = $this->categoryService->getCategory($id);
            return $this->successResponse('Successfully found.', $category, 201);
        } catch (\Throwable $th) {
            return $this->errorResponse(false, $th->getMessage(), 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        try {
            $categoryService = $this->categoryService->updateCategory($request->validated(), $id);
            return $this->successResponse('Category is successfully updated', $categoryService, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Category updating failed', $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->categoryService->deleteCategory($id);
    }
}
