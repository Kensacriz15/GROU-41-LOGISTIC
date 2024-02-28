<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Bidding;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::with('bidding', 'vendor', 'product')->paginate(10);
        return view('app.contracts.index', compact('contracts'));
    }

    public function create()
{
    $biddingId = request()->get('bidding_id'); // Get from query param or form field

    $biddings = Bidding::all();
    $vendors = Vendor::all();
    $products = Product::all();

    $selectedBidding = null;
    if ($biddingId) {
        $selectedBidding = Bidding::find($biddingId);
    }

    return view('app.contracts.create', compact('biddings', 'vendors', 'products', 'selectedBidding'));
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bidding_id' => 'required|exists:biddings,id',
            'vendor_id' => 'required|exists:vendors,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'delivery_date' => 'required|date',
            'payment_terms' => 'required',
            'status' => 'required|in:pending,active,completed,terminated'
        ]);

        try {
            Contract::create($validatedData);
            return redirect()->route('app.contracts.index')->with('success', 'Contract created successfully!');
        } catch(\Exception $e) {
            Log::error('Contract Creation Error:', [$e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to create contract. Please contact your administrator.');
        }
    }

    public function show(Contract $contract)
    {
        return view('app.contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        $biddings = Bidding::all();
        $vendors = Vendor::all();
        $products = Product::all();
        return view('app.contracts.edit', compact('contract', 'biddings', 'vendors', 'products'));
    }

    public function update(Request $request, Contract $contract)
    {
        $validatedData = $request->validate([
            'bidding_id' => 'required|exists:biddings,id',
            'vendor_id' => 'required|exists:vendors,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'delivery_date' => 'required|date',
            'payment_terms' => 'required',
            'status' => 'required|in:pending,active,completed,terminated'
        ]);

        $contract->update($validatedData);

        return redirect()->route('app.contracts.index')->with('success', 'Contract updated successfully!');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('app.contracts.index')->with('success', 'Contract deleted successfully!');
    }
}
