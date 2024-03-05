<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
  public function index(Request $request)
{
    $search = $request->query('search');

    $productCategories = ProductCategory::query()
                        ->where('name', 'LIKE', "%{$search}%")
                        ->with('products')
                        ->get();

                        return view('app.product_categories.index', compact('productCategories'));
}

    public function create()
    {
        return view('app.product_categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|unique:product_categories'
        ]);

        ProductCategory::create($validatedData);

        return redirect()->route('app.product_categories.index')
                         ->with('success', 'Product category created!');
    }

    public function show(ProductCategory $productCategory)
    {
        return view('app.product_categories.show', compact('productCategory'));
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('app.product_categories.edit', compact('productCategory'));
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|unique:product_categories,name,' . $productCategory->id
        ]);

        $productCategory->update($validatedData);

        return redirect()->route('app.product_categories.index')
                         ->with('success', 'Product category updated!');
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return redirect()->route('app.product_categories.index')
                         ->with('success', 'Product category deleted!');
    }
}
