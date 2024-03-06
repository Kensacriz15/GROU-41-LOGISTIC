@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Invoice #{{ $invoice->id }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Vendor:</strong> {{ $invoice->vendor->name }}</p>
            <p><strong>Purchase Order:</strong> {{ $invoice->purchaseOrder->id }}</p>
            <p><strong>Amount:</strong> ${{ $invoice->amount }}</p>
            <p><strong>Invoice Date:</strong> {{ $invoice->invoice_date->format('Y-m-d') }}</p>
            <p><strong>Due Date:</strong> {{ $invoice->due_date->format('Y-m-d') }}</p>
            <p><strong>Discount:</strong> {{ $invoice->discount }}%</p>
            <p><strong>Total Due:</strong> ${{ $invoice->total_due }}</p>
            <p><strong>Bank Name:</strong> {{ $invoice->bank_name }}</p>
            <p><strong>Country:</strong> {{ $invoice->country ?? 'N/A' }}</p>
            <p><strong>IBAN:</strong> {{ $invoice->iban ?? 'N/A' }}</p>
            <p><strong>SWIFT Code:</strong> {{ $invoice->swift_code ?? 'N/A' }}</p>
            {{-- Add more details if needed --}}
        </div>
    </div>
@endsection
