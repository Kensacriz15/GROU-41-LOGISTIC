@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Make a Payment</h1>
        </div>
        <div class="card-body">
            <form action="/payments/update-payment" method="POST" onsubmit="return updatePayment()">
                @csrf

                <div class="form-group">
                    <label for="purchaseOrderId">Purchase Order ID:</label>
                    <input type="number" id="purchaseOrderId" name="purchaseOrderId" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="amountPaid">Amount Paid:</label>
                    <input type="number" step="0.01" id="amountPaid" name="amountPaid" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit Payment</button>
            </form>
        </div>
    </div>

    <script>
        function updatePayment() {
            const purchaseOrderId = document.getElementById('purchaseOrderId').value;
            const amountPaid = parseFloat(document.getElementById('amountPaid').value);

            fetch('/payments/update-payment', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ purchaseOrderId, amountPaid })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Update failed');
                }
                return response.json();
            })
            .then(data => {
                alert(data.message);
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred while updating the payment.");
            });

            return false; // Prevent traditional form submission
        }
    </script>
@endsection
