@extends('layouts/layoutMaster')

@section('content')
    <h1>Edit Bid</h1>
    <form action="{{ route('bids.update', $bid->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="bidding_id">Bidding</label>
            <select name="bidding_id" id="bidding_id" class="form-control">
                @foreach ($biddings as $bidding)
                    <option value="{{ $bidding->id }}" {{ $bidding->id == $bid->bidding_id ? 'selected' : '' }}>{{ $bidding->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="vendor_id">Vendor</label>
            <select name="vendor_id" id="vendor_id" class="form-control">
                @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}" {{ $vendor->id == $bid->vendor_id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $bid->price }}">
        </div>
        <div class="form-group">
            <label for="delivery_time">Delivery Time</label>
            <input type="text" name="delivery_time" id="delivery_time" class="form-control" value="{{ $bid->delivery_time }}">
        </div>
        <div class="form-group">
            <label for="terms_and_conditions">Terms and Conditions</label>
            <textarea name="terms_and_conditions" id="terms_and_conditions" class="form-control" rows="3">{{ $bid->terms_and_conditions }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
