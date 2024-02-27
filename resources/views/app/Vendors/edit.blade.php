@extends('layouts.layoutMaster')

@section('content')
    <h1>Edit Vendor</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('app.vendors.update', $vendor) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $vendor->name) }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $vendor->email) }}" required>
        </div>
        <div class="form-group">
            <label for="contact_name">Contact Name</label>
            <input type="text" class="form-control" id="contact_name" name="contact_name" value="{{ old('contact_name', $vendor->contact_name) }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $vendor->phone) }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address" required>{{ old('address', $vendor->address) }}</textarea>
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" class="form-control" id="website" name="website" value="{{ old('website', $vendor->website) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Vendor</button>
    </form>
@endsection
