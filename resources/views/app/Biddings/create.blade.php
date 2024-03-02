@extends('layouts/layoutMaster')

@section('content')
    <h1>Create Bidding</h1>
    <form action="{{ route('app.biddings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="datetime-local" name="start_date" id="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="datetime-local" name="end_date" id="end_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
