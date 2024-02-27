@extends('layouts.layoutMaster')

@section('content')
    <h1>Products</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Unit Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->unit_price }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">View</a>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
