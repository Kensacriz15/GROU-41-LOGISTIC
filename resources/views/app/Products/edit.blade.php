@extends('layouts.layoutMaster')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="unit_price">Unit Price</label>
            <input type="number" name="unit_price" id="unit_price" class="form-control" value="{{ $product->unit_price }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
