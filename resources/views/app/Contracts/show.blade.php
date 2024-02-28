@extends('layouts.layoutMaster')

@section('content')
    <h1>Contract Details</h1>

    <p><strong>Bidding:</strong> {{ $contract->bidding->name ?? 'N/A' }}</p>
    <p><strong>Vendor:</strong> {{ $contract->vendor->name }}</p>
    <p><strong>Product:</strong> {{ $contract->product->name ?? 'N/A' }}</p>
    <p><strong>Quantity:</strong> {{ $contract->quantity }}</p>
    <p><strong>Price:</strong> {{ $contract->price }}</p>
    <p><strong>Delivery Date:</strong> {{ $contract->delivery_date }}</p>
    <p><strong>Payment Terms:</strong> {{ $contract->payment_terms }}</p>
    <p><strong>Status:</strong> {{ $contract->status }}</p>
@endsection
