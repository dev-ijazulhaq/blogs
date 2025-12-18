<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $category_service)
    {
        $this->categoryService = $category_service;
    }

    public function getAllCategories()
    {
        $categories = $this->categoryService->getAllCategory();
        return view('pages.web.categories', compact('categories'));
    }
}
