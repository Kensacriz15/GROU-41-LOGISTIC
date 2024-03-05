@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Contract</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('app.contracts.update', $contract) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="bidding_id">Bidding:</label>
                    <select class="form-control" id="bidding_id" name="bidding_id" required>
                        <option value="">Select Bidding</option>
                        @foreach ($biddings as $bidding)
                            <option value="{{ $bidding->id }}" {{ $bidding->id == $contract->bidding_id ? 'selected' : '' }}>
                                {{ $bidding->product->name ?? 'N/A' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="vendor_id">Vendor:</label>
                    <select class="form-control" id="vendor_id" name="vendor_id" required>
                        <option value="">Select Vendor</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}" {{ $contract->vendor_id == $vendor->id ? 'selected' : '' }}>
                                {{ $vendor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_id">Product:</label>
                    <select class="form-control" id="product_id" name="product_id" required>
                        <option value="">Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ $contract->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $contract->quantity) }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $contract->price) }}" required>
                </div>

                <div class="form-group">
                    <label for="delivery_date">Delivery Date:</label>
                    <input type="date" class="form-control" id="delivery_date" name="delivery_date" value="{{ old('delivery_date', $contract->delivery_date) }}" required>
                </div>

                <div class="form-group">
                    <label for="payment_terms">Payment Terms:</label>
                    <textarea class="form-control" id="payment_terms" name="payment_terms" required>{{ old('payment_terms', $contract->payment_terms) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="pending" {{ $contract->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="active" {{ $contract->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="completed" {{ $contract->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="terminated" {{ $contract->status == 'terminated' ? 'selected' : '' }}>Terminated</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Contract</button>
            </form>
        </div>
    </div>
@endsection