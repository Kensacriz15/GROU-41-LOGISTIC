@extends('layouts.layoutMaster')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h1>Product Details</h1>
                    <p><strong>Name:</strong> {{ $product->name }}</p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Unit Price:</strong> {{ $product->unit_price }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h2>Inventories Stored</h2>
                    @foreach($product->inventories as $inventory)
                        <p>Inventory Name: {{ $inventory->name }}</p>
                        <p>Quantity: {{ $inventory->pivot->quantity }}</p>
                        <p>Reorder Level: {{ $inventory->pivot->reorder_level }}</p>
                        @if($inventory->pivot->quantity < $inventory->pivot->reorder_level)
                            <p class="low-stock">Low Stock!</p>
                            <p class="low-stock-warning">Please reorder soon.</p>
                        @endif
                    @endforeach
                    @if(count($product->inventories) == 0)
                        <p>No inventories stored.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div style="text-align: center; margin: 20px;">
    <a href="{{ route('app.products.index') }}"class="btn btn-sm btn-secondary">Back to List</a>
</div>
@endsection
