<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::all();
    return view('app.products.index', compact('products'));
  }

  public function create()
  {
    return view('app.products.create');
  }

  public function store(Request $request)
  {
    $product = Product::create($request->all());
    return redirect()->route('app.products.show', $product->id);
  }

public function show(Product $product)
{
    $product->load('inventories');
    return view('app.products.show', compact('product'));
}


  public function edit(Product $product)
  {
    return view('app.products.edit', compact('product'));
  }

  public function update(Request $request, Product $product)
  {
    $product->update($request->all());
    return redirect()->route('app.products.show', $product->id);
  }

  public function destroy(Product $product)
  {
    $product->delete();
    return redirect()->route('app.products.index');
  }
}
