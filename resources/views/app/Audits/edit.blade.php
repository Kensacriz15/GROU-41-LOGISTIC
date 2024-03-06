@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Audit</h1>
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

            <form method="POST" action="{{ route('app.audits.update', $audit )}}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="purchase_order_id">Purchase Order:</label>
                    <select name="purchase_order_id" class="form-control">
                        @foreach ($purchaseOrders as $id => $orderId)
                            <option value="{{ $id }}" {{ $id == $audit->purchase_order_id ? 'selected' : '' }}>
                                {{ $orderId }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" rows="5">{{ old('description', $audit->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" class="form-control">
                        <option value="pending" {{ $audit->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $audit->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Audit</button>
            </form>
        </div>
    </div>
@endsection
