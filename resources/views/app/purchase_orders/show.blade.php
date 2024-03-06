@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Purchase Order Details</h1>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="contract_id">Contract:</label>
                <p>{{ $purchaseOrder->contract->id }}</p>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <p>{{ $purchaseOrder->quantity }}</p>
            </div>

            <div class="form-group">
                <label for="delivery_date">Delivery Date:</label>
                <p>{{ $purchaseOrder->delivery_date->format('Y-m-d') }}</p>
            </div>

            <a href="{{ route('app.purchase_orders.edit', $purchaseOrder->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('app.purchase_orders.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
