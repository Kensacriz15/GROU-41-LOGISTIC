<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrder::with('contract')->paginate(10);
        return view('app.purchase_orders.index', compact('purchaseOrders'));
    }

    public function create()
    {
        $contracts = Contract::all();
        return view('app.purchase_orders.create', compact('contracts'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contract_id' => 'required|exists:contracts,id',
            'quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date',
            'amount_paid' => 'required|numeric|min:0', // Validation for 'amount_paid'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the purchase order (include 'amount_paid' with a default of 0)
        PurchaseOrder::create(array_merge($request->all(), ['amount_paid' => 0.01]));

        return redirect()->route('app.purchase_orders.index')->with('success', 'Purchase order created.');
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        return view('app.purchase_orders.show', compact('purchaseOrder'));
    }

    public function edit(PurchaseOrder $purchaseOrder)
    {
        $contracts = Contract::all();
        return view('app.purchase_orders.edit', compact('purchaseOrder', 'contracts'));
    }

    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        $validator = Validator::make($request->all(), [
            'contract_id' => 'required|exists:contracts,id',
            'quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date',
            'amount_paid' => 'required|numeric|min:0', // Validation for 'amount_paid'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the purchase order
        $purchaseOrder->update($request->all()); // Save 'amount_paid'

        return redirect()->route('app.purchase_orders.index')->with('success', 'Purchase order updated.');
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();
        return redirect()->route('app.purchase_orders.index')->with('success', 'Purchase order deleted.');
    }
}
