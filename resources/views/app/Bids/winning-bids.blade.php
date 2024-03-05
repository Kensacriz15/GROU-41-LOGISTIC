@extends('layouts.layoutMaster')


@section('content')
    <h1>Winning Bids</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div style="text-align: center; margin: 20px;">
        <select name="invoice_id" id="invoice-select">
            <option value="">-- Select Invoice --</option>
            @foreach ($invoices as $invoice)
                <option value="{{ $invoice->id }}">Invoice #{{ $invoice->id }}</option>
            @endforeach
        </select>
    </div>

    <form method="POST" action="{{ route('app.bids.createLineItems') }}">
        @csrf
        <table class="table">
        <thead>
            <tr>
            <th>Product</th>
            <th>Vendor</th>
            <th>Price</th>
            <th>Delivery Time</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($winningBids as $bid)
            <tr>
                <td>{{ $bid->bidding->product->name ?? 'N/A' }}</td>
                <td>{{ $bid->vendor->name }}</td>
                <td>{{ $bid->price }}</td>
                <td>{{ $bid->delivery_time }} days</td>
            </tr>
            @endforeach
        </tbody>
    </table>

        <div style="text-align: center; margin: 20px;">
            <button type="submit" class="btn btn-primary">Create Line Items</button>
        </div>
    </form>
@endsection
