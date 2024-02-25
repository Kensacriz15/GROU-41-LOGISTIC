@extends('layouts/layoutMaster')

@section('content')
    <h1>Bid Details</h1>
    <table class="table mt-3">
        <tr>
            <th>ID</th>
            <td>{{ $bid->id }}</td>
        </tr>
        <tr>
            <th>Bidding</th>
            <td>{{ $bid->bidding->id }}</td>
        </tr>
        <tr>
            <th>Vendor</th>
            <td>{{ $bid->vendor->name }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $bid->price }}</td>
        </tr>
        <tr>
            <th>Delivery Time</th>
            <td>{{ $bid->delivery_time }}</td>
        </tr>
        <tr>
            <th>Terms and Conditions</th>
            <td>{{ $bid->terms_and_conditions }}</td>
        </tr>
    </table>
@endsection
