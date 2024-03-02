@extends('layouts.layoutMaster')

@section('content')
<h1>Product Inventory Details</h1>

@if($productInventory->product)
    <p><strong>Product:</strong> {{ $productInventory->product->name }}</p>
@endif

@if($productInventory->inventory)
    <p><strong>Inventory:</strong> {{ $productInventory->inventory->name }}</p>
@endif

<p><strong>Quantity:</strong> {{ $productInventory->quantity }}
    @if($productInventory->quantity <= $productInventory->reorder_level)
        <span style="color: red;"> (Low Stock)</span>
    @endif
</p>
<p><strong>Reorder Level:</strong> {{ $productInventory->reorder_level }}</p>
@endsection
