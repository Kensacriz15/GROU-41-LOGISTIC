@extends('layouts.layoutMaster')

@section('content')
    <h1>Vendor: {{ $vendor->name }}</h1>

    <p><strong>Email:</strong> {{ $vendor->email }}</p>
    <p><strong>Contact Name:</strong> {{ $vendor->contact_name }}</p>
    <p><strong>Phone:</strong> {{ $vendor->phone }}</p>
    <p><strong>Address:</strong> {{ $vendor->address }}</p>
    <p><strong>Website:</strong> <a href="{{ $vendor->website }}" target="_blank">{{ $vendor->website }}</a></p>

@endsection
