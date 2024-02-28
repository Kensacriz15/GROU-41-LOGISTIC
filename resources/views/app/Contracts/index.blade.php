@extends('layouts.layoutMaster')

@section('content')
    <h1>Contracts</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Bidding</th>
                <th>Vendor</th>
                <th>Product</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contracts as $contract)
                <tr>
                    <td>{{ $contract->bidding->product->name ?? 'N/A' }}</td>
                    <td>{{ $contract->vendor->name }}</td>
                    <td>{{ $contract->product->name ?? 'N/A' }}</td>
                    <td>{{ $contract->status }}</td>
                    <td>
                        <a href="{{ route('app.contracts.show', $contract) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('app.contracts.edit', $contract) }}" class="btn btn-sm btn-secondary">View</a>
                        <form action="{{ route('app.contracts.destroy', $contract) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Contract?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: center; margin: 20px;">
    <a href="{{ route('app.contracts.create') }}" class="btn btn-primary">Create Contract</a>
    </div>
    {{ $contracts->links() }} {{-- Display pagination links --}}
@endsection
