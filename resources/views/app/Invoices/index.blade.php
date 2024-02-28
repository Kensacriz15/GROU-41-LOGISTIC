@extends('layouts.layoutMaster')

@section('content')
    <h1>Invoices</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            Error Display (Implement as needed)
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Vendor</th>
            <th>Amount</th>
            <th>Invoice Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->vendor->name }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>{{ $invoice->invoice_date->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('app.invoices.show', $invoice) }}">View</a>
                    <a href="{{ route('app.invoices.edit', $invoice) }}">Edit</a>
                    {{-- Add a delete form/button with necessary precautions --}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div style="text-align: center; margin: 20px;">
    <a href="{{ route('app.invoices.create') }}" class="btn btn-primary">Create New Invoices</a>
    </div>
    {{ $invoices->links() }}
@endsection
