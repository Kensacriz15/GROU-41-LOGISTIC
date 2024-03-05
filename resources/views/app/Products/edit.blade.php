@extends('layouts.layoutMaster')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('app.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
        </div>

        <div class="form-group">
            <label for="product_category_id">Category</label>
            <select name="product_category_id" id="product_category_id" class="form-control">
                <option value="">Select a Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->product_category_id ? 'selected' : '' }}>
                        {{  $category->name  }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="unit_price">Unit Price</label>
            <input type="number" name="unit_price" id="unit_price" class="form-control" value="{{ $product->unit_price }}">
        </div>

        <div class="form-group">
        <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
            </div>

        <div class="form-group">
            <label for="production_date">Production Date</label>
            <input type="date" name="production_date" id="production_date" class="form-control" value="{{ $product->production_date }}">
        </div>

        <div class="form-group">
            <label for="expiration_date">Expiration Date</label>
            <input type="date" name="expiration_date" id="expiration_date" class="form-control" value="{{ $product->expiration_date }}">
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
