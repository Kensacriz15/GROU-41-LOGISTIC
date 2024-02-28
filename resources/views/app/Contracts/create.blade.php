@extends('layouts.layoutMaster')

@section('content')
    <h1>Create Contract</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('app.contracts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="bidding_id">Bidding:</label>
            <select class="form-control" id="bidding_id" name="bidding_id" required>
            <option value="">Select Bidding</option>
                @foreach ($biddings as $bidding)
                <option value="{{ $bidding->id }}" {{ $selectedBidding && $selectedBidding->id == $bidding->id ? 'selected' : '' }}>
            {{ $bidding->product->name }}
         </option>
         @endforeach
        </select>
        </div>
        <div class="form-group">
    <label for="vendor_id">Vendor:</label>
    <select class="form-control" id="vendor_id" name="vendor_id" required>
        <option value="">Select Vendor</option>
        @foreach ($vendors as $vendor)
            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="product_id">Product:</label>
     <select class="form-control" id="product_id" name="product_id" required>
        <option value="">Select Product</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>
</div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="delivery_date">Delivery Date:</label>
            <input type="date" class="form-control" id="delivery_date" name="delivery_date" required>
        </div>

        <div class="form-group">
            <label for="payment_terms">Payment Terms:</label>
            <textarea class="form-control" id="payment_terms" name="payment_terms" required></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="pending">Pending</option>
                <option value="active">Active</option>
                <option value="completed">Completed</option>
                <option value="terminated">Terminated</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Contract</button>
    </form>
@endsection
