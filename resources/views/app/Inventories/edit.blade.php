@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Inventory</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('app.inventories.update', $inventory->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ $inventory->name }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" required>{{ $inventory->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="address" class="form-control" value="{{ $inventory->address }}" required>
                </div>

                <div class="form-group">
                    <label for="contact_person">Contact Person:</label>
                    <input type="text" name="contact_person" class="form-control" value="{{ $inventory->contact_person }}" required>
                </div>

                <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" name="type" class="form-control" value="{{ $inventory->type }}" required>
                </div>

                {{-- Add more form fields for editing inventory details --}}

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
