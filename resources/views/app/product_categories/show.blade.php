@extends('layouts.layoutMaster')

@section('title', 'Product Category Details')

@section('content')
    <h1>Product Category: {{ $productCategory->name }}</h1>

   <p><strong>ID:</strong> {{ $productCategory->id }}</p>
   <p><strong>Created At:</strong> {{ $productCategory->created_at }}</p>
   <p><strong>Updated At:</strong> {{ $productCategory->updated_at }}</p>
@endsection
