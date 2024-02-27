@extends('layouts/layoutMaster')

@section('content')
    <h1>Bidding Details</h1>
    <table class="table mt-3">
        <tr>
            <th>ID</th>
            <td>{{ $bidding->id }}</td>
        </tr>
        <tr>
            <th>Product</th>
            <td>{{ $bidding->product->name }}</td>
        </tr>
        <tr>
            <th>Start Date</th>
            <td>{{ $bidding->start_date }}</td>
        </tr>
        <tr>
            <th>End Date</th>
            <td>{{ $bidding->end_date }}</td>
        </tr>
    </table>
@endsection
