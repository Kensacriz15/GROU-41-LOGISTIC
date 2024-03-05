@extends('layouts.layoutMaster')

@section('content')
<h1>Quality Standards</h1>

@if (count($standards) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Purpose and Scope</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($standards as $standard)
                <tr>
                    <td>{{ $standard->id }}</td>
                    <td>{{ $standard->name }}</td>
                    <td>{{ $standard->purpose_scope }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="alert alert-info">No quality standards found.</p>
@endif
@endsection