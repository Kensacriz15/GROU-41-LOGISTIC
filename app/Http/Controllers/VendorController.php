<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
  public function index(Request $request)
  {
    $search_term = $request->input('search');

    $vendors = Vendor::query(); // Start with the base query

    if ($search_term) {
        $vendors->where('name', 'LIKE', "%{$search_term}%")
                ->orWhere('email', 'LIKE', "%{$search_term}%")
                ->orWhere('contact_name', 'LIKE', "%{$search_term}%");
    }

    $vendors = $vendors->paginate(10);
    return view('app.vendors.index', compact('vendors'));
  }
  public function create()
  {
    return view('app.vendors.create');
  }
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'contact_name' => 'required',
      'phone' => 'required',
      'address' => 'required',
      'website' => 'nullable|url',
    ]);

    Vendor::create($validatedData);

    return redirect()
      ->route('app.vendors.index')
      ->with('success', 'Vendor created successfully!');
  }
  public function show(Vendor $vendor)
  {
    return view('app.vendors.show', compact('vendor'));
  }

  public function edit(Vendor $vendor)
  {
    return view('app.vendors.edit', compact('vendor'));
  }

  public function update(Request $request, Vendor $vendor)
  {
    $validatedData = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'contact_name' => 'required',
      'phone' => 'required',
      'address' => 'required',
      'website' => 'nullable|url',
    ]);

    $vendor->update($validatedData);

    return redirect()
      ->route('app.vendors.index')
      ->with('success', 'Vendor updated successfully!');
  }

  public function destroy(Vendor $vendor)
  {
    $vendor->delete();
    return redirect()
      ->route('app.vendors.index')
      ->with('success', 'Vendor deleted successfully!');
  }
}
