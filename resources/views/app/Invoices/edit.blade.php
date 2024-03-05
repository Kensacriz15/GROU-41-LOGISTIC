@extends('layouts.layoutMaster')

@section('content')
    <h1>Edit Invoice</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('app.invoices.update', $invoice )}}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="vendor_id">Vendor:</label>
            <select name="vendor_id" class="form-control">
                @foreach ($vendors as $id => $name)
                    <option value="{{ $id }}" {{ $id == $invoice->vendor_id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="purchase_order_id">Purchase Order:</label>
            <select name="purchase_order_id" class="form-control">
                @foreach ($purchaseOrders as $id => $orderId)
                    <option value="{{ $id }}" {{ $id == $invoice->purchase_order_id ? 'selected' : '' }}>
                        {{ $orderId }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $invoice->amount) }}">
        </div>

        <div class="form-group">
            <label for="invoice_date">Invoice Date:</label>
            <input type="date" name="invoice_date" class="form-control" value="{{ old('invoice_date', $invoice->invoice_date->format('Y-m-d')) }}">
        </div>

        <div class="form-group">
            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $invoice->due_date->format('Y-m-d')) }}">
        </div>

        <div class="form-group">
    <label for="discount">Discount (%):</label>
    <input type="number" step="0.01" name="discount" class="form-control" value="{{ old('discount', $invoice->discount) }}">
</div>

 <div class="form-group">
    <label for="total_due">Total Due:</label>
    <input type="number" step="0.01" name="total_due" class="form-control" value="{{ old('total_due', $invoice->total_due) }}">
</div>

<div class="form-group">
            <label for="bank_name">Bank Name:</label>
            <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name', $invoice->bank_name) }}">
        </div>

        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" name="country" class="form-control" value="{{ old('country', $invoice->country) }}">
        </div>

        <div class="form-group">
            <label for="iban">IBAN:</label>
            <input type="text" name="iban" class="form-control" value="{{ old('iban', $invoice->iban) }}">
        </div>

        <div class="form-group">
            <label for="swift_code">SWIFT Code:</label>
            <input type="text" name="swift_code" class="form-control" value="{{ old('swift_code', $invoice->swift_code) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Invoice</button>
    </form>
@endsection
