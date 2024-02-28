<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductInventory;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductInventoryController extends Controller
{
  public function index()
{
    $productInventories = Product::with('inventories')->get(); // Assuming Product has `inventories` relationship
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
    $product->inventories()->attach($request->inventory_id, [
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
public function destroy($productInventoryId, Request $request)
{
    $productInventory = ProductInventory::findOrFail($productInventoryId);
    $productInventory->inventories()->detach($request->inventory_id); // Only pass the inventory_id

    return redirect()->route('app.product_inventories.index')
                 ->with('success', 'Product removed from inventory successfully.');
}
}
