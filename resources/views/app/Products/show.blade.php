@extends('layouts.layoutMaster')

@section('content')
<div class="container">
  <div class="row mt-4">
    <div class="col-md-6">
      <div class="card text-center h-100">
        <div class="card-body">
          <h1>Product Details</h1>
          <p><strong>Name:</strong> {{ $product->name }}</p>
          <p><strong>Category:</strong>
      @if($product->product_category)
        {{ $product->product_category->name }}
      @else
          No category assigned
      @endif
</p>
          <p><strong>Unit Price:</strong> {{ $product->unit_price }}</p>
          <p><strong>Description:</strong> {{ $product->description }}</p>
          <p><strong>Production Date:</strong> {{ $product->production_date }}</p>
          <p><strong>Expiration Date:</strong> {{ $product->expiration_date }}</p>
          @if ($product->image_path)
          <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
     style="max-width: 150px; max-height: 150px; object-fit: cover; border: 2px solid #ccc;">           @else
            <p>No Image Available</p>
          @endif
        </div>
      </div>
    </div>
        <div class="col-md-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h2>Inventories Stored</h2>
                    @foreach($product->inventories as $inventory)
                        <p>Inventory Name: {{ $inventory->name }}</p>
                        <p>Quantity: {{ $inventory->pivot->quantity }}</p>
                        <p>Reorder Level: {{ $inventory->pivot->reorder_level }}</p>
                        @if($inventory->pivot->quantity < $inventory->pivot->reorder_level)
                            <p class="low-stock">Low Stock!</p>
                            <p class="low-stock-warning">Please reorder soon.</p>
                        @endif
                    @endforeach
                    @if(count($product->inventories) == 0)
                        <p>No inventories stored.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div style="text-align: center; margin: 20px;">
    <a href="{{ route('app.products.index') }}"class="btn btn-sm btn-secondary">Back to List</a>
</div>
@endsection
