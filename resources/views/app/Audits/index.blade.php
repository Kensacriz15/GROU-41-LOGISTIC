@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Audits</h1>
            <form action="{{ route('app.audits.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by ID">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Error Display (Implement as needed)
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Purchase Order</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($audits as $audit)
                        <tr>
                            <td>{{ $audit->id }}</td>
                            <td>{{ $audit->purchaseOrder->id }}</td>
                            <td>{{ $audit->description }}</td>
                            <td>{{ $audit->status }}</td>
                            <td>
                                <a href="{{ route('app.audits.show', $audit) }}">View</a>
                                <a href="{{ route('app.audits.edit', $audit) }}">Edit</a>
                                {{-- Add a delete form/button with necessary precautions --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="text-align: center; margin: 20px;">
                <a href="{{ route('app.audits.create') }}" class="btn btn-primary">Create Audits</a>
            </div>
            {{ $audits->links() }}
        </div>
    </div>
@endsection
