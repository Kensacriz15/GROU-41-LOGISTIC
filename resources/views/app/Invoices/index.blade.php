@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Invoices</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Error Display (Implement as needed)
                </div>
            @endif

            <form method="GET" action="{{ route('app.invoices.index') }}">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by invoice ID, vendor, amount...">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <div class="table-responsive">
    <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vendor</th>
                        <th>Amount</th>
                        <th>Invoice Date</th>
                        <th>Total Due</th>
                        <th>Bank Name</th>
                        <th>Country</th>
                        <th>IBAN</th>
                        <th>SWIFT Code</th>
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
                            <td>{{ $invoice->total_due ?? 'N/A' }}</td>
                            <td>{{ $invoice->bank_name ?? 'N/A' }}</td>
                            <td>{{ $invoice->country ?? 'N/A' }}</td>
                            <td>{{ $invoice->iban ?? 'N/A' }}</td>
                            <td>{{ $invoice->swift_code ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('app.invoices.show', $invoice) }}"class="btn btn-sm btn-primary">View</a>
                                <a href="{{ route('app.invoices.edit', $invoice) }}" class="btn btn-sm btn-secondary">Edit</a>
<a href="{{ route('app.invoices.pdf', ['invoice' => $invoice->id]) }}" class="btn btn-sm btn-success">Generate PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</div>
            <div style="text-align: center; margin: 20px;">
                <a href="{{ route('app.invoices.create') }}" class="btn btn-primary">Create New Invoices</a>
            </div>
            {{ $invoices->links() }}
        </div>
    </div>
@endsection
