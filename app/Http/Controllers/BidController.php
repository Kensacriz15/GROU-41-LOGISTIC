<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Invoice;
use App\Models\Vendor;
use App\Models\Bidding;
use App\Models\Winning;
use Illuminate\Http\Request;
use App\Models\LineItem;


class BidController extends Controller
{
  public function index()
  {
    $bids = Bid::orderBy('price', 'asc')->get();
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
  public function showWinningBids()
  {
      $winningBids = Bid::where('is_won', true)->get();
      $invoices = Invoice::all(); // Replace `Invoice` with your actual model name

      return view('app.bids.winning-bids', compact('winningBids', 'invoices'));
  }
public function createLineItems(Request $request)
{
    // 1. Get Selected Bid IDs
    $selectedBidIds = $request->bid_ids;
    if (!$selectedBidIds) {
        return redirect()->back()->with('error', 'Please select at least one bid.');
    }

    // 2. Get Invoice ID (replace with your actual mechanism)
    $invoiceId = $request->invoice_id;
    if (!$invoiceId) {
        return redirect()->back()->with('error', 'Please select an invoice.');
    }

    // 3. Line Item Creation Loop
    foreach ($selectedBidIds as $bidId) {
        $bid = Bid::find($bidId);

        if ($bid) { // Check if bid exists
            $lineItem = new LineItem();
            $lineItem->invoice_id = $invoiceId;
            $lineItem->product_id = $bid->product_id;
            $lineItem->price = $bid->price;
            // ...set other line item fields if you have them...
            $lineItem->save();
        }
    }

    // 4. Success Redirect
    return redirect()->back()->with('success', 'Line items created successfully!');
}

public function makeWinner(Bid $bid)
{


    // 1. Set is_won
    $bid->is_won = true;
    $bid->save();
    $winningBids = Bid::where('is_won', true)->get();

    return redirect()->back()->with('success', 'Bid marked as winner.');
}

}
