@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Audit #{{ $audit->id }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Purchase Order:</strong> {{ $audit->purchaseOrder->id }}</p>
            <p><strong>Description:</strong> {{ $audit->description }}</p>
            <p><strong>Status:</strong> {{ $audit->status }}</p>
            {{-- Add more fields if needed --}}
        </div>
    </div>
@endsection
