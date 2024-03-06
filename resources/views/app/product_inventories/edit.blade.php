@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Product Inventory</h1>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <form action="{{ route('app.product_inventories.update', $productInventory->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="product_id">Product:</label>
                    <select name="product_id" id="product_id" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ $product->id == $productInventory->product_id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Loop through productInventory's inventories -->
                @foreach ($productInventory->inventories as $inventory)
                    <div class="form-group">
                        <label for="inventory_id_{{ $inventory->id }}">Inventory:</label>
                        <input type="text" name="inventory_id[]" id="inventory_id_{{ $inventory->id }}" class="form-control" value="{{ $inventory->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="quantity[{{ $inventory->id }}]">Quantity ({{ $inventory->name }}):</label>
                        <input type="number" name="quantity[{{ $inventory->id }}]" id="quantity[{{ $inventory->id }}]" class="form-control"
                               value="{{ old('quantity.' . $inventory->id, $inventory->pivot->quantity) }}">
                        @error('quantity.' . $inventory->id)
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="reorder_level[{{ $inventory->id }}]">Reorder Level ({{ $inventory->name }}):</label>
                        <input type="number" name="reorder_level[{{ $inventory->id }}]" id="reorder_level[{{ $inventory->id }}]" class="form-control"
                               value="{{ old('reorder_level.' . $inventory->id, $inventory->pivot->reorder_level) }}">
                        @error('reorder_level.' . $inventory->id)
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
