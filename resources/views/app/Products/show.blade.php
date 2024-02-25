@extends('layouts.layoutMaster')

@section('content')
    <h1>Product Details</h1>
    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Unit Price:</strong> {{ $product->unit_price }}</p>
    <a href="{{ route('products.index') }}">Back to List</a>
@endsection
