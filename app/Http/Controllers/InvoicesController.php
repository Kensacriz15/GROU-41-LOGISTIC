<?php

namespace App\Http\Controllers;

require_once(base_path('app/Helpers/PdfWrapper.php'));


use App\Helpers\PdfWrapper;
use Dompdf\Dompdf;
use Dompdf\Options;
use Dompdf\Adapter\CPDF;
use App\Models\Invoice;
use App\Models\Vendor;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceEmail;


class InvoicesController extends Controller
{
    /**
     * Display a listing of the invoices.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
{
    $query = Invoice::with('vendor','purchaseOrder');

    if ($request->has('search')) {
        $search = $request->search;
        $query->where('id', 'like', "%$search%")
              ->orWhereHas('vendor', function($q) use ($search) {
                  $q->where('name', 'like', "%$search%");
              })
              ->orWhere('amount', 'like', "%$search%");
    }

    $invoices = $query->paginate(10);
    return view('app.invoices.index', compact('invoices'));
}


    /**
     * Show the form for creating a new invoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::pluck('name', 'id');
        $purchaseOrders = PurchaseOrder::pluck('id', 'id'); // Adjust if needed

        return view('app.invoices.create', compact('vendors', 'purchaseOrders'));
    }

    /**
     * Store a newly created invoice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required|integer|exists:vendors,id',
            'purchase_order_id' => 'required|integer|exists:purchase_orders,id',
            'amount' => 'required|numeric',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:invoice_date',
            'discount' => 'nullable|numeric', // Example: If discount is optional
            'total_due' => 'required|numeric',
            'bank_name' => 'required|string',
            'country' => 'required|string',
            'iban' => 'required|string',
            'swift_code' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Explicitly create an invoice. Avoid create($request->all()) for security
        $invoice = new Invoice();
        $invoice->vendor_id = $request->vendor_id;
        $invoice->purchase_order_id = $request->purchase_order_id;
        $invoice->amount = $request->amount;
        $invoice->invoice_date = now();
        $invoice->due_date = now()->addDays(30);
        $invoice->total_due = $request->total_due;
        $invoice->bank_name = $request->bank_name;
        $invoice->country = $request->country;
        $invoice->iban = $request->iban;
        $invoice->swift_code = $request->swift_code;

        $invoice->save();

        return redirect()->route('app.invoices.index')->with('success', 'Invoice created successfully.');
    }

    /**
     * Display the specified invoice.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
      $invoice->load('vendor');
        return view('app.invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified invoice.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $vendors = Vendor::pluck('name', 'id');
        $purchaseOrders = PurchaseOrder::pluck('id', 'id'); // Adjust if needed

        return view('app.invoices.edit', compact('invoice', 'vendors', 'purchaseOrders'));
    }

    /**
     * Update the specified invoice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
      $invoice->vendor_id = $request->vendor_id;
      $invoice->purchase_order_id = $request->purchase_order_id;
      $invoice->amount = $request->amount;
      $invoice->invoice_date = $request->invoice_date;
      $invoice->due_date = $request->due_date;
      $invoice->discount = $request->discount;
      $invoice->total_due = $request->total_due;
      $invoice->bank_name = $request->bank_name;
      $invoice->country = $request->country;
      $invoice->iban = $request->iban;
      $invoice->swift_code = $request->swift_code;

      $invoice->save();

      return redirect()->route('app.invoices.index')->with('success', 'Invoice updated successfully.');

        return redirect()->route('app.invoices.index')->with('success', 'Invoice updated successfully.');
    }

    /**
     * Remove the specified invoice from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('app.invoices.index')->with('success', 'Invoice deleted successfully.');
    }

     /**
     *  Generate the Invoice Preview
     */
    public function showTemplate($invoiceId)
    {
        $invoice = Invoice::with('vendor.bids.product', 'lineItems')
                       ->where('id', $invoiceId)
                       ->firstOrFail();
        return view('app.invoices.invoice_preview', compact('invoice'));
    }

    public function generateInvoicePDF(Request $request, Invoice $invoice)
    {
        // 1. Load Invoice Data
        $invoice->load('vendor', 'lineItems.product'); // Adjust relationships as needed

        $pdf = \PDF::loadView('app.invoices.invoice_preview', compact('invoice'));
        $pdfWrapper = $pdf->output();


        // 4. Prepare Email
        $emailData = [
            'emailTo' => $invoice->vendor->email,
            'subject' => 'Invoice #' . $invoice->id . ' from ' . config('variables.templateName'),
        ];

        // 5. Send Email with PDF Attachment
        \Mail::send(new InvoiceEmail($pdfWrapper, $emailData));

        return redirect()->back()->with('success', 'Invoice PDF generated and emailed.');
    }
  }
