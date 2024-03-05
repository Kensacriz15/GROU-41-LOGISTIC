@extends('layouts/layoutMaster')

@section('content')
    <h1>Bidding Details</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">ID: {{ $bidding->id }}</h5>

            <div class="row">
                <div class="col-md-4">
                    @if ($bidding->product->image_path)
                        <img src="{{ asset('storage/product_images/' . $bidding->product->image_path) }}" alt="{{ $bidding->product->name }}" class="img-fluid">
                    @else
                        <p>No Image Available</p>
                    @endif
                </div>
                <div class="col-md-8">
                    <p><strong>Product:</strong> {{ $bidding->product->name }}</p>
                    <p><strong>Start Date:</strong> {{ $bidding->start_date }}</p>
                    <p><strong>End Date:</strong> {{ $bidding->end_date }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
