<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductInventory;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductInventoryController extends Controller
{
  public function index(Request $request)
  {
      $search = $request->input('search');
      $query = Product::query();

      if ($search) {
          $query->whereHas('inventories', function ($q) use ($search) {
              $q->where('name', 'like', "%$search%");
          });
      }

      $productInventories = $query->with('inventories')->get();

      return view('app.product_inventories.index', compact('productInventories'));
  }

    public function create()
    {
        $products = Product::all();
        $inventories = Inventory::all();
        return view('app.product_inventories.create', compact('products', 'inventories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'inventory_id' => 'required|exists:inventories,id',
            'quantity' => 'required|integer|min:0', // Ensure quantity is non-negative
            'reorder_level' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        $product = Product::findOrFail($request->product_id);
        $inventory = Inventory::findOrFail($request->inventory_id);

        // Check if the product already has an associated inventory
        if ($product->inventories->isNotEmpty()) {
            // Update the existing inventory record
            $product->inventories()->detach();
        }

        // Attach the new inventory record
        $product->inventories()->attach($inventory, [
            'quantity' => $request->quantity,
            'reorder_level' => $request->reorder_level
        ]);

        return redirect()->route('app.product_inventories.store')
                         ->with('success', 'Product added to inventory successfully.');
    }
public function edit($productInventoryId)
{
    $productInventory = ProductInventory::with('inventories')->findOrFail($productInventoryId);
    $products = Product::all();
    $inventories = Inventory::all();
    return view('app.product_inventories.edit', compact('productInventory', 'products', 'inventories'));
}
public function update(Request $request, $productInventoryId)
{
    $validator = Validator::make($request->all(), [
        'quantity' => 'required|array',
        'quantity.*' => 'required|integer|min:0', // Ensure quantity is non-negative
        'reorder_level' => 'required|array',
        'reorder_level.*' => 'required|integer'
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
    }

    $productInventory = ProductInventory::findOrFail($productInventoryId);

    $inventoriesData = [];
    foreach ($request->quantity as $index => $quantity) {
        $inventoriesData[$request->inventory_id[$index]] = [
            'quantity' => $quantity,
            'reorder_level' => $request->reorder_level[$index]
        ];
    }

    $productInventory->inventories()->sync($inventoriesData);

    return redirect()->route('app.product_inventories.index')
                     ->with('success', 'Product inventory updated successfully.');
}
public function show(ProductInventory $productInventory)
{

    return view('app.product_inventories.show', compact('productInventory'));
}
public function destroy($productInventoryId, Request $request)
{
  $productInventory->inventories()->detach($request->inventory_id); // Only pass the inventory_id

    return redirect()->route('app.product_inventories.index')
                 ->with('success', 'Product removed from inventory successfully.');
}
public function addInventoryToProduct(Request $request, Product $product)
{
    $inventory = Inventory::find($request->inventory_id);

    $product->inventories()->updateExistingPivot($inventory->id, [
        'quantity' => $request->quantity,
        'reorder_level' => $request->reorder_level
    ]);

    // ... other logic, e.g., redirect with a success message...
}
}
