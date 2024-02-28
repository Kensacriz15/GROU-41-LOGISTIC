<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Vendor;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoicesController extends Controller
{

    public function index()
    {
        $invoices = Invoice::with('vendor', 'purchaseOrder')->paginate(10);
        return view('app.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $vendors = Vendor::pluck('name', 'id');
        $purchaseOrders = PurchaseOrder::pluck('id', 'id'); // Adjust if needed

        return view('app.invoices.create', compact('vendors', 'purchaseOrders'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required|integer|exists:vendors,id',
            'purchase_order_id' => 'required|integer|exists:purchase_orders,id',
            'amount' => 'required|numeric',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:invoice_date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Invoice::create($request->all());

        return redirect()->route('app.invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function show(Invoice $invoice)
    {
        return view('app.invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $vendors = Vendor::pluck('name', 'id');
        $purchaseOrders = PurchaseOrder::pluck('id', 'id'); // Adjust if needed

        return view('app.invoices.edit', compact('invoice', 'vendors', 'purchaseOrders'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $invoice->update($request->all());

        return redirect()->route('app.invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('app.invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
