@extends('layouts.layoutMaster')

@section('title', 'Edit Product Category')

@section('content')

    <h1>Edit Product Category</h1>

    <form method="POST" action="{{ route('app.product_categories.update', $productCategory->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $productCategory->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
@endsection
