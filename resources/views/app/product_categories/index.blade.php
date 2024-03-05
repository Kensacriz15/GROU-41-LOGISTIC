@extends('layouts.layoutMaster')

@section('title', 'Product Categories')

@section('content')
    <h1>Product Categories</h1>

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
                    <a href="{{ route('app.product_categories.edit', $category->id) }}">Edit</a>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
