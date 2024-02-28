@extends('layouts.layoutMaster')

@section('content')
    <h1>Audit #{{ $audit->id }}</h1>

    <p><strong>Purchase Order:</strong> {{ $audit->purchaseOrder->id }}</p>
    <p><strong>Description:</strong> {{ $audit->description }}</p>
    <p><strong>Status:</strong> {{ $audit->status }}</p>

    {{-- Add  more fields if needed --}}
@endsection
