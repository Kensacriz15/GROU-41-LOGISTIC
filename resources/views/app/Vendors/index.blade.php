@extends('layouts.layoutMaster')

@section('content')
    <h1 class="text-center">Vendors List</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->name }}</td>
                    <td>{{ $vendor->email }}</td>
                    <td>{{ $vendor->contact_name }}</td>
                    <td>
                        <a href="{{ route('app.vendors.show', $vendor) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('app.vendors.edit', $vendor) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('app.vendors.destroy', $vendor) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this bidding?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: center; margin: 20px;">
    <a href="{{ route('app.vendors.create') }}" class="btn btn-primary">Create Vendor</a>
    </div>
    <div style="text-align: center; margin: 20px;">
    <a href="{{ route('app.bids.index') }}" class="btn btn-warning">Winners</a>
    </div>
    {{ $vendors->links() }}
@endsection
