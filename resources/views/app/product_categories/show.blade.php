@extends('layouts.layoutMaster')

@section('title', 'Product Category Details')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Product Category: {{ $productCategory->name }}</h1>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $productCategory->id }}</p>
            <p><strong>Created At:</strong> {{ $productCategory->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $productCategory->updated_at }}</p>
        </div>
    </div>
@endsection
