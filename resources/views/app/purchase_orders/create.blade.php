@extends('layouts.layoutMaster')

@section('content')
    <h1>Create Purchase Order</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('app.purchase_orders.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="contract_id">Contract:</label>
            <select name="contract_id" class="form-control">
                <option value="">Select Contract</option>
                @foreach ($contracts as $contract)
                    <option value="{{ $contract->id }}">{{ $contract->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
        </div>

        <div class="form-group">
            <label for="delivery_date">Delivery Date:</label>
            <input type="date" name="delivery_date" class="form-control" value="{{ old('delivery_date') }}">
        </div>
        <div class="form-group">
    <label for="amount_paid">Amount Paid:</label>
    <input type="number" step="0.01" name="amount_paid" class="form-control" value="{{ old('amount_paid') }}">
</div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
