@extends('layouts.layoutMaster')

@section('content')
    <h1>Invoice #{{ $invoice->id }}</h1>

    <p><strong>Vendor:</strong> {{ $invoice->vendor->name }}</p>
    <p><strong>Purchase Order:</strong> {{ $invoice->purchaseOrder->id }}</p>
    <p><strong>Amount:</strong> ${{ $invoice->amount }}</p>
    <p><strong>Invoice Date:</strong> {{ $invoice->invoice_date->format('Y-m-d') }}</p>
    <p><strong>Due Date:</strong> {{ $invoice->due_date->format('Y-m-d') }}</p>

    {{-- Add more details if needed --}}
@endsection
