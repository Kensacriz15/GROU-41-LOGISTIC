@extends('layouts.layoutMaster')

@section('title', 'Edit Product Category')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Edit Product Category</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('app.product_categories.update', $productCategory->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $productCategory->name }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
@endsection
