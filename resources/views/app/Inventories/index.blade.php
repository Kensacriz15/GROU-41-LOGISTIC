@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Inventories</h1>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <form method="GET" action="{{ route('app.inventories.index') }}">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by name or description...">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th width="280px">Action</th>
                </tr>
                @php $i = 0; @endphp
                @forelse ($inventories as $inventory)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $inventory->name }}</td>
                    <td>{{ $inventory->description }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('app.inventories.show',$inventory->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('app.inventories.edit',$inventory->id) }}">Edit</a>
                        <form action="{{ route('app.inventories.destroy', $inventory) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Inventory?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No inventories found.</td>
                </tr>
                @endforelse
            </table>
            <div style="text-align: center; margin: 20px;">
                <a href="{{ route('app.inventories.create') }}" class="btn btn-primary">Create New Inventory</a>
            </div>
            <div style="text-align: center; margin: 20px;">
                <a href="{{ route('app.product_inventories.index') }}" class="btn btn-warning">List of Product in Inventory</a>
            </div>
            {!! $inventories->links() !!}
        </div>
    </div>
@endsection
