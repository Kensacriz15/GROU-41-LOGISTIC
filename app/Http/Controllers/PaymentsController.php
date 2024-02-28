<?php

namespace App\Http\Controllers;
use App\Controllers\PurchaseOrderController;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentsController extends Controller
{
    /**
     * Display recent payments associated with purchase orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRecentPayments()
    {
        $recentPayments = PurchaseOrder::where('amount_paid', '>', 0)
                                       ->orderBy('updated_at', 'desc')
                                       ->limit(10)
                                       ->get();


        return view('app.payments.recent', compact('recentPayments'));
    }

    public function updatePayment(Request $request)
{
    // 1. Input Validation
    $validator = Validator::make($request->all(), [
        'purchaseOrderId' => 'required|integer|exists:purchase_orders,id',
        'amountPaid' => 'required|numeric|min:0',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422); // Return validation errors with a 422 status code
    }

    // 2. Find Purchase Order
    $purchaseOrder = PurchaseOrder::findOrFail($request->purchaseOrderId);

    // 3. Update Amount
    $purchaseOrder->amount_paid = $request->amountPaid;
    $purchaseOrder->save();

    // 4. Return a Success Response
    return response()->json([
        'message' => 'Payment updated successfully!'
    ], 200);
}
}
