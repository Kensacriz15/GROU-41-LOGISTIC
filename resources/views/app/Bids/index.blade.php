@extends('layouts.layoutMaster')

@section('content')
    <h1>Bids</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Vendor</th>
                <th>Price</th>
                <th>Delivery Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bids as $bid)
                <tr>
                    <td>{{ $bid->bidding->product->name ?? 'N/A' }}</td>
                    <td>{{ $bid->vendor->name }}</td>
                    <td>{{ $bid->price }}</td>
                    <td>{{ $bid->delivery_time }} days</td>
                    <td>
                        <a href="{{ route('app.bids.show', $bid) }}"class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('app.bids.edit', $bid) }}"class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('app.bids.destroy', $bid->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this bids?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: center; margin: 20px;">
    <a href="{{ route('app.bids.create') }}" class="btn btn-primary">Create Vendor Bid</a>
    </div>
    {{ $bids->links() }}
@endsection
