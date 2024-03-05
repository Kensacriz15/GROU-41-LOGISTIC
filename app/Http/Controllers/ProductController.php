<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::with('product_category')->get();
    return view('app.products.index', compact('products'));
  }

  public function create()
  {
      $categories = ProductCategory::all();
      return view('app.products.create', compact('categories'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required',
      'product_category_id' => 'required',
      'production_date' => 'nullable|date',
      'expiration_date' => 'nullable|date',
      'unit_price' => 'required|numeric',
      'description' => 'nullable',
      'image' => 'nullable|image',
  ]);
      if ($request->hasFile('image')) {
          $filenameWithExt = $request->file('image')->getClientOriginalName();
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          $extension = $request->file('image')->getClientOriginalExtension();

          $i = 1;
          $baseName = $filename . '.' . $extension;
          while (file_exists(storage_path('app/public/product_images/' . $baseName))) {
              $baseName = $filename . '_' . $i . '.' . $extension;
              $i++;
          }

          $fileNameToStore = $baseName;
          $path = $request->file('image')->storeAs('public/product_images', $fileNameToStore);
      } else {
          $fileNameToStore = 'noimage.jpg';
      }

      $product = Product::create([
        'name' => $request->name,
        'description' => $request->description ?? '',
        'product_category_id' => $request->product_category_id,
        'production_date' => $request->production_date,
        'expiration_date' => $request->expiration_date,
        'unit_price' => $request->unit_price,
        'image_path' => $fileNameToStore,
    ]);

      return redirect()->route('app.products.show', $product->id);
  }



public function show(Product $product)
{
    $product->load('inventories');
    $category = $product->product_category;
    return view('app.products.show', compact('product'));
}


public function edit(Product $product)
{
    $categories = ProductCategory::all();
    return view('app.products.edit', compact('product', 'categories'));
}

public function update(Request $request, Product $product)
{
    // Validation rules
    $validatedData = $request->validate([
        'name' => 'required',
        'product_category_id' => 'required',
        'production_date' => 'nullable|date',
        'expiration_date' => 'nullable|date',
        'unit_price' => 'required|numeric',
        'image' => 'nullable|image',
        'description' => 'nullable',
    ]);

    // Handle image upload (if a new image is provided)
    if ($request->hasFile('image')) {
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();

        $i = 1;
        $baseName = $filename . '.' . $extension;
        while (file_exists(storage_path('app/public/product_images/' . $baseName))) {
            $baseName = $filename . '_' . $i . '.' . $extension;
            $i++;
        }

        $fileNameToStore = $baseName;
        $path = $request->file('image')->storeAs('public/product_images', $fileNameToStore);

        // Delete the old image (if it exists and isn't the default)
        if ($product->image_path && $product->image_path !== 'noimage.jpg') {
            $oldImagePath = storage_path('app/public/product_images/' . $product->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image file
            }
        }

        // Update the product's image path with the new filename
        $product->image_path = $fileNameToStore;
    }

    // Update other product fields
    $product->name = $request->name;
    $product->product_category_id = $request->product_category_id;
    $product->production_date = $request->production_date;
    $product->expiration_date = $request->expiration_date;
    $product->unit_price = $request->unit_price;
    $product->description = $request->description;
    $product->save();

    return redirect()->route('app.products.show', $product->id);
}




public function destroy(Product $product)
{
    // Delete the image if it exists
    if ($product->image_path && $product->image_path != 'noimage.jpg') {
        $imagePath = storage_path('app/public/product_images/' . $product->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the file
        }
    }

    $product->delete(); // Delete the product record itself
    return redirect()->route('app.products.index');
}
}
