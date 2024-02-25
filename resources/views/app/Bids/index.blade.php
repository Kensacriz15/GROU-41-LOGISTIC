@extends('layouts/layoutMaster')

@section('content')
    <h1>Bids</h1>
    <a href="{{ route('bids.create') }}" class="btn btn-primary">Create Bid</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Bidding</th>
                <th>Vendor</th>
                <th>Price</th>
                <th>Delivery Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bids as $bid)
                <tr>
                    <td>{{ $bid->id }}</td>
                    <td>{{ $bid->bidding->id }}</td>
                    <td>{{ $bid->vendor->name }}</td>
                    <td>{{ $bid->price }}</td>
                    <td>{{ $bid->delivery_time }}</td>
                    <td>
                        <a href="{{ route('bids.show', $bid->id) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('bids.edit', $bid->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('bids.destroy', $bid->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this bid?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
