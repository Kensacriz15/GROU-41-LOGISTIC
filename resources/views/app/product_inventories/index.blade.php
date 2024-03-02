@extends('layouts.layoutMaster')

@section('content')
    <h1>Product Inventories</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a href="{{ route('app.product_inventories.create') }}" class="btn btn-primary">Add New</a>

    <table class="table table-bordered">
        <tr>
            <th>Product Name</th>
            <th>Inventory Name</th>
            <th>Quantity</th>
            <th>Reorder Level</th>
            <th>Actions</th>
        </tr>

        @foreach ($productInventories as $product)
            @foreach ($product->inventories as $inventory)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $inventory->name }}</td>
                    <td>{{ $inventory->pivot->quantity }}</td>
                    <td>{{ $inventory->pivot->reorder_level }}</td>
                    <td>
                        <a href="{{ route('app.product_inventories.show', $product->id) }}" class="btn btn-sm btn-info">Show</a>
                        <a href="{{ route('app.product_inventories.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                      </td>
                </tr>
            @endforeach
        @endforeach
    </table>
@endsection
