@extends('layouts.layoutMaster')

@section('content')
    <h1>Edit Purchase Order</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('app.purchase_orders.update', $purchaseOrder->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="contract_id">Contract:</label>
            <select name="contract_id" class="form-control">
                @foreach ($contracts as $contract)
                    <option value="{{ $contract->id }}" {{ $purchaseOrder->contract_id == $contract->id ? 'selected' : '' }}>
                        {{ $contract->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" class="form-control" value="{{ $purchaseOrder->quantity }}">
        </div>

        <div class="form-group">
            <label for="delivery_date">Delivery Date:</label>
            <input type="date" name="delivery_date" class="form-control" value="{{ $purchaseOrder->delivery_date->format('Y-m-d') }}">
        </div>
        <div class="form-group">
        <label for="amount_paid">Amount Paid:</label>
        <input type="number" step="0.01" name="amount_paid" class="form-control" value="{{ old('amount_paid', $purchaseOrder->amount_paid) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
