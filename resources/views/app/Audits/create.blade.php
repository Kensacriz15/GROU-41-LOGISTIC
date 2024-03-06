@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Create Audit</h1>
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

            <form method="POST" action="{{ route('app.audits.store') }}">
                @csrf

                <div class="form-group">
                    <label for="purchase_order_id">Purchase Order:</label>
                    <select name="purchase_order_id" class="form-control">
                        <option value="">Select Purchase Order</option>
                        @foreach ($purchaseOrders as $id => $orderId)
                            <option value="{{ $id }}">{{ $orderId }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" class="form-control">
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Audit</button>
            </form>
        </div>
    </div>
@endsection
