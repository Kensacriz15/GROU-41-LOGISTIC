<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Vendor;
use App\Models\Bidding;
use Illuminate\Http\Request;

class BidController extends Controller
{
  public function index()
  {
    $bids = Bid::with('bidding', 'vendor')->paginate(10);
    return view('app.bids.index', compact('bids'));
  }

  public function create()
  {
    $biddings = Bidding::all(); // Adjust if you want to filter biddings
    $vendors = Vendor::all();
    return view('app.bids.create', compact('biddings', 'vendors'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'bidding_id' => 'required|exists:biddings,id',
      'vendor_id' => 'required|exists:vendors,id',
      'price' => 'required|numeric',
      'delivery_time' => 'required|integer',
      'terms_and_conditions' => 'required',
    ]);

    Bid::create($validatedData);

    return redirect()
      ->route('app.bids.index')
      ->with('success', 'Bid created successfully!');
  }

  public function show(Bid $bid)
  {
    $bid->load('bidding', 'vendor'); // Eager-load for efficiency
    return view('app.bids.show', compact('bid'));
  }

  public function edit(Bid $bid)
  {
    $biddings = Bidding::all();
    $vendors = Vendor::all();
    return view('app.bids.edit', compact('bid', 'biddings', 'vendors'));
  }

  public function update(Request $request, Bid $bid)
  {
    $validatedData = $request->validate([
      'bidding_id' => 'required|exists:biddings,id',
      'vendor_id' => 'required|exists:vendors,id',
      'price' => 'required|numeric',
      'delivery_time' => 'required|integer',
      'terms_and_conditions' => 'required',
    ]);

    $bid->update($validatedData);
    return redirect()
      ->route('app.bids.index')
      ->with('success', 'Bid updated successfully!');
  }

  public function destroy(Bid $bid)
  {
    $bid->delete();
    return redirect()
      ->route('app.bids.index')
      ->with('success', 'Bid deleted successfully!');
  }
}
