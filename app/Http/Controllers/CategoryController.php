<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('auth.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $this->categoryService->create($data);
            DB::commit();
            return redirect()->route('categories.index')->with('success', 'Category created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Category creation failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('auth.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('auth.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        DB::beginTransaction();

        try {
            $this->categoryService->update($category, $data);
            DB::commit();
            return redirect()->route('categories.index')->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Category update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();

        try {
            $this->categoryService->delete($category);
            DB::commit();
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Category deletion failed');
        }
    }
}
