@extends('layouts.layoutMaster')

@section('content')
    <h1>Bid Details</h1>

    <p><strong>Bidding:</strong> {{ $bid->bidding->product->name ?? 'N/A' }}</p>
    <p><strong>Vendor:</strong> {{ $bid->vendor->name }}</p>
    <p><strong>Price:</strong> {{ $bid->price }}</p>
    <p><strong>Delivery Time:</strong> {{ $bid->delivery_time }} days</p>
    <p><strong>Terms and Conditions:</strong> {{ $bid->terms_and_conditions }}</p>

@endsection
