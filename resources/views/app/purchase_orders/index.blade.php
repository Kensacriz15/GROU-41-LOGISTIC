@extends('layouts.layoutMaster')

@section('content')
    <h1>Purchase Orders</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a href="{{ route('app.purchase_orders.create') }}" class="btn btn-primary">Create New</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Contract</th>
            <th>Quantity</th>
            <th>Delivery Date</th>
            <th>Actions</th>
        </tr>
        @foreach ($purchaseOrders as $purchaseOrder)
            <tr>
                <td>{{ $purchaseOrder->id }}</td>
                <td>{{ $purchaseOrder->contract->id }} </td> {{-- Access contract ID --}}
                <td>{{ $purchaseOrder->quantity }}</td>
                <td>{{ $purchaseOrder->delivery_date->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('app.purchase_orders.show',$purchaseOrder->id) }}" class="btn btn-sm btn-info">Show</a>
                    <a href="{{ route('app.purchase_orders.edit',$purchaseOrder->id) }}" class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('app.purchase_orders.destroy',$purchaseOrder->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this purchase order?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $purchaseOrders->links() }} {{-- For pagination --}}
@endsection
