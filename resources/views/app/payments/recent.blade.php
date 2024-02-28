@extends('layouts.layoutMaster')

@section('content')
    <h1>Recent Payments</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Purchase Order ID</th>
                <th>Amount Paid</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recentPayments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->amount_paid }}</td>
                    <td>{{ $payment->updated_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
