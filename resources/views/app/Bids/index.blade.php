@extends('layouts.layoutMaster')

@section('content')
    <h1>Bids</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('app.bids.create') }}" class="btn btn-primary">Create Bid</a>

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
                        <a href="{{ route('app.bids.show', $bid) }}">View</a>
                        <a href="{{ route('app.bids.edit', $bid) }}">Edit</a>
                        <form action="{{ route('app.bids.destroy', $bid) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $bids->links() }}
@endsection
