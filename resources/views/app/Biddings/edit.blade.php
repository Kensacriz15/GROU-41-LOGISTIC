@extends('layouts/layoutMaster')

@section('content')
    <h1>Edit Bidding</h1>
    <form action="{{ route('app.biddings.update', $bidding->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control">
    @foreach ($products as $product)
        <option value="{{ $product->id }}" {{ $product->id == $bidding->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
    @endforeach
</select>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ $bidding->end_date ? \Carbon\Carbon::parse($bidding->end_date)->format('Y-m-d\TH:i') : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
