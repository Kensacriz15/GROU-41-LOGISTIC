@extends('layouts.layoutMaster')

@section('content')
    <h1>Edit Bid</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('app.bids.update', $bid) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="bidding">Bidding</label>
            <select class="form-control" id="bidding" name="bidding_id" required>
                <option value="">Select Bidding</option>
                @foreach ($biddings as $bidding)
                    <option value="{{ $bidding->id }}" {{ $bidding->id == $bid->bidding_id ? 'selected' : '' }}>
                        {{ $bidding->product->name ?? 'N/A' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="vendor">Vendor</label>
            <select class="form-control" id="vendor" name="vendor_id" required>
                <option value="">Select Vendor</option>
                @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}" {{ $vendor->id == $bid->vendor_id ? 'selected' : '' }}>
                        {{ $vendor->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $bid->price) }}" required>
        </div>
        <div class="form-group">
            <label for="delivery_time">Delivery Time (days)</label>
            <input type="number" class="form-control" id="delivery_time" name="delivery_time" value="{{ old('delivery_time', $bid->delivery_time) }}" required>
        </div>
        <div class="form-group">
            <label for="terms_and_conditions">Terms and Conditions</label>
            <textarea class="form-control" id="terms_and_conditions" name="terms_and_conditions" required>{{ old('terms_and_conditions', $bid->terms_and_conditions) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Bid</button>
    </form>
@endsection
