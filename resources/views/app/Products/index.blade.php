@extends('layouts.layoutMaster')

@section('content')
        <div class="card">
            <div class="card-header">
                <h1>Products</h1>
            </div>
            <div class="card-body">
            <form action="{{ route('app.products.index') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Unit Price</th>
                            <th>Description</th>
                            <th>Production Date</th>
                            <th>Expiration Date</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->unit_price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->production_date }}</td>
                            <td>{{ $product->expiration_date }}</td>
                            <td>
                                {{ $product->product_category ? $product->product_category->name : 'No category assigned' }}
                            </td>
                            <td>
                                <a href="{{ route('app.products.show', $product->id) }}" class="btn btn-sm btn-primary">View</a>
                                <a href="{{ route('app.products.edit', $product->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                <form action="{{ route('app.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center mt-3">
                    <a href="{{ route('app.products.create') }}" class="btn btn-primary">Create Product</a>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('app.product_categories.index') }}" class="btn btn-warning">List Category</a>
                </div>
            </div>
        </div>
@endsection
