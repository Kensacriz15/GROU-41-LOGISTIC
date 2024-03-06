@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Product Inventory Details</h1>
        </div>
        <div class="card-body">
            @if($productInventory->product)
                <p><strong>Product:</strong> {{ $productInventory->product->name }}</p>
            @endif

            @if($productInventory->inventories->isNotEmpty())
                <p><strong>Inventory:</strong>
                    @foreach ($productInventory->inventories as $inventory)
                        {{ $inventory->name }},
                    @endforeach
                </p>
            @endif

            <p><strong>Quantity:</strong> {{ $productInventory->quantity }}
                @if($productInventory->quantity <= $productInventory->reorder_level)
                    <span style="color: red;"> (Low Stock)</span>
                @endif
            </p>
            <p><strong>Reorder Level:</strong> {{ $productInventory->reorder_level }}</p>
        </div>
    </div>
@endsection
