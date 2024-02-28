@extends('layouts.layoutMaster')

@section('content')
    <h1>Product Inventory Details</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div>
        <p><strong>Product:</strong> {{ $productInventory->product->name }}</p>
        <p><strong>Inventory:</strong> {{ $productInventory->inventory->name }}</p>
        <p><strong>Quantity:</strong> {{ $productInventory->pivot->quantity }}</p>

        {{-- Reorder Alert --}}
        <p><strong>Reorder Level:</strong>
           {{ $productInventory->pivot->reorder_level }}
           @if ($productInventory->pivot->quantity <= $productInventory->pivot->reorder_level)
               <span class="badge rounded-pill bg-warning text-dark">Reorder Needed</span>
           @endif
        </p>
    </div>
@endsection
