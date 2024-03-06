<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Inventory::query();

        if ($search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%")
                  ->orWhere('contact_person', 'like', "%$search%")
                  ->orWhere('type', 'like', "%$search%");
        }

        $inventories = $query->paginate(10);  // Example: Paginate with 10 items per page

        return view('app.inventories.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.inventories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:inventories',
            'description' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'type' => 'required',
        ]);

        // Authorization Placeholder (if needed)
        // if (!$this->authorize('create', Inventory::class)) {
        //     abort(403, 'Unauthorized action.');
        // }

        Inventory::create($validatedData);

        return redirect()->route('app.inventories.index')->with('success', 'Inventory created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        return view('app.inventories.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        return view('app.inventories.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:inventories,name,' . $inventory->id,
            'description' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'type' => 'required',
        ]);

        // Authorization Placeholder (if needed)
        // if (!$this->authorize('update', $inventory)) {
        //     abort(403, 'Unauthorized action.');
        // }

        $inventory->update($validatedData);

        return redirect()->route('app.inventories.index')->with('success', 'Inventory updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        // Authorization Placeholder (if needed)
        // if (!$this->authorize('delete', $inventory)) {
        //     abort(403, 'Unauthorized action.');
        // }

        $inventory->delete();
        return redirect()->route('app.inventories.index')->with('success', 'Inventory deleted successfully!');
    }
}
