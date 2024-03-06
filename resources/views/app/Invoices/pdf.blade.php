<!DOCTYPE html>
<html>
<head>
    <title>Invoices #{{ $invoice->id }}</title>
    <style>
        /* Basic styling */
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        td, th { border: 1px solid #ddd; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Invoice #{{ $invoice->id }}</h1>

    <p><strong>Date Issued:</strong> {{ $invoice->created_at->format('d-m-Y') }}</p>

    <div> <h3>Invoice To:</h3>
        <p>{{ $invoice->vendor->name }}</p>
        <p>{{ $invoice->vendor->address }}</p>
        <p>{{ $invoice->vendor->phone }}</p>
    </div>
    <div> <h3>Bill To:</h3>
        <p>{{ $invoice->total_due }}</p>
        <p>{{ $invoice->bank_name }}</p>
        <p>{{ $invoice->country }}</p>
        <p>{{ $invoice->iban }}</p>
        <p>{{ $invoice->swift_code }}</p>
    </div>
    <table> <thead>
            <tr>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->lineItems as $item)
            <tr>
                <td>{{ $item->product->name ?? 'N/A' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₱{{ number_format($item->price, 2) }}</td>
                <td>₱{{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right;">Subtotal:</td>
                <td>₱{{ number_format($invoice->subtotal, 2) }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;">Tax:</td>
                <td>₱{{ number_format($invoice->tax, 2) }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                <td><strong>₱{{ number_format($invoice->total, 2) }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
