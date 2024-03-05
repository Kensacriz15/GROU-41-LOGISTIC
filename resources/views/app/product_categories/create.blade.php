@extends('layouts.layoutMaster')

@section('title', 'Create Product Category')

@section('content')
    <h1>Create Product Category</h1>

    <form method="POST" action="{{ route('app.product_categories.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
@endsection
