@extends('layouts.layoutMaster')

@section('title', 'Product Categories')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Product Categories</h1>
        </div>
        <div class="card-body">
            <a href="{{ route('app.product_categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
            <form method="GET" action="{{ route('app.product_categories.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by name">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productCategories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('app.product_categories.show', $category->id) }}" class="btn btn-primary btn-sm">Show</a>
                                <a href="{{ route('app.product_categories.edit', $category->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                <form action="{{ route('app.product_categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
