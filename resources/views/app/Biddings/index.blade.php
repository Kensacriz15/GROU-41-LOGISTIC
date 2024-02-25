@extends('layouts/layoutMaster')

@section('content')
    <h1>Biddings</h1>
    <a href="{{ route('biddings.create') }}" class="btn btn-primary">Create Bidding</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($biddings as $bidding)
                <tr>
                    <td>{{ $bidding->id }}</td>
                    <td>{{ $bidding->product->name }}</td>
                    <td>{{ $bidding->start_date }}</td>
                    <td>{{ $bidding->end_date }}</td>
                    <td>
                        <a href="{{ route('biddings.show', $bidding->id) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('biddings.edit', $bidding->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('biddings.destroy', $bidding->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this bidding?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
