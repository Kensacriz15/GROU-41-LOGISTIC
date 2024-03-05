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
        <div class="form-group">
    <label for="discount">Discount (%):</label>
    <input type="number" step="0.01" name="discount" class="form-control" value="{{ old('discount') }}">
</div>

<div class="form-group">
    <label for="total_due">Total Due:</label>
    <input type="number" step="0.01" name="total_due" class="form-control" value="{{ old('total_due') }}">
</div>

<div class="form-group">
    <label for="bank_name">Bank Name:</label>
    <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name') }}">
</div>
<div class="form-group">
    <label for="country">Country:</label>
    <input type="text" name="country" class="form-control" value="{{ old('country') }}">
</div>

<div class="form-group">
    <label for="iban">IBAN:</label>
    <input type="text" name="iban" class="form-control" value="{{ old('iban') }}">
</div>

<div class="form-group">
    <label for="swift_code">SWIFT Code:</label>
    <input type="text" name="swift_code" class="form-control" value="{{ old('swift_code') }}">
</div>
        <button type="submit" class="btn btn-primary">Create Invoice</button>
    </form>
@endsection
