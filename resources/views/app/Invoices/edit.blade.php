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

        <button type="submit" class="btn btn-primary">Update Invoice</button>
    </form>
@endsection
