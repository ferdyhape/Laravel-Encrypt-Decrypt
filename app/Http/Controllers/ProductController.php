<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Support\Facades\DB;
use App\Services\EncryptionService;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    private $productService;
    private $categoryService;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->categoryService = new CategoryService();
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return view('auth.product.index', compact('products'));
    }


    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view('auth.product.create', compact('categories'));
    }


    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();

        try {
            $this->productService->create($data);
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Product creation failed');
        }
    }


    public function show(Product $product)
    {
        return view('auth.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = $this->categoryService->getAll();
        return view('auth.product.edit', compact('product', 'categories'));
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        DB::beginTransaction();

        try {
            $this->productService->update($product, $data);
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Product update failed');
        }
    }


    public function destroy(Product $product)
    {
        DB::beginTransaction();

        try {
            $this->productService->delete($product);
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Product deletion failed');
        }
    }
}
