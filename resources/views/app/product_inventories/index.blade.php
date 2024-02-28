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
            <tr>
                <td>{{ $product->name }}</td>
                <td>
                    @if ($product->inventories->isNotEmpty())
                        @foreach ($product->inventories->unique('id') as $inventory)
                            {{ $inventory->name }}<br>
                        @endforeach
                    @else
                        No inventory associated
                    @endif
                </td>
                <td>
                    @if ($product->inventories->isNotEmpty())
                        @foreach ($product->inventories->unique('id') as $inventory)
                            {{ $inventory->pivot->quantity }}<br>
                        @endforeach
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($product->inventories->isNotEmpty())
                        @foreach ($product->inventories->unique('id') as $inventory)
                            {{ $inventory->pivot->reorder_level }}<br>
                        @endforeach
                    @else
                        -
                    @endif
                </td>
                <td>
                    @foreach ($product->inventories->unique('id') as $inventory)
                        <a href="{{ route('app.product_inventories.show', $product->id) }}" class="btn btn-sm btn-info">Show</a>
                        <a href="{{ route('app.product_inventories.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
@endsection
