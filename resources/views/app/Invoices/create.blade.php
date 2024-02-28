@extends('layouts.layoutMaster')

@section('content')
    <h1>Create Invoice</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('app.invoices.store') }}">
        @csrf

        <div class="form-group">
            <label for="vendor_id">Vendor:</label>
            <select name="vendor_id" class="form-control">
                <option value="">Select Vendor</option> @foreach ($vendors as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="purchase_order_id">Purchase Order:</label>
            <select name="purchase_order_id" class="form-control">
                <option value="">Select Purchase Order</option>
                @foreach ($purchaseOrders as $id => $orderId)
                    <option value="{{ $id }}">{{ $orderId }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount') }}">
        </div>

        <div class="form-group">
            <label for="invoice_date">Invoice Date:</label>
            <input type="date" name="invoice_date" class="form-control" value="{{ old('invoice_date') }}">
        </div>

        <div class="form-group">
            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}">
        </div>

        <button type="submit" class="btn btn-primary">Create Invoice</button>
    </form>
@endsection
