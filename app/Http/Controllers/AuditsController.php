<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuditsController extends Controller
{

  public function index(Request $request)
  {
      $search = $request->input('search');

      $audits = Audit::with('purchaseOrder')
          ->when($search, function ($query) use ($search) {
              return $query->where('id', 'LIKE', "%$search%");
          })
          ->paginate(10);

      return view('app.audits.index', compact('audits'));
  }

    public function create()
    {
        $purchaseOrders = PurchaseOrder::pluck('id', 'id');
        return view('app.audits.create', compact('purchaseOrders'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'purchase_order_id' => 'required|integer|exists:purchase_orders,id',
            'description' => 'required',
            'status' => 'required|in:pending,completed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Audit::create($request->all());

        return redirect()->route('app.audits.index')->with('success', 'Audit created successfully.');
    }
    public function show(Audit $audit)
    {
        return view('app.audits.show', compact('audit'));
    }
 function edit(Audit $audit)
    {
        $purchaseOrders = PurchaseOrder::pluck('id', 'id');
        return view('app.audits.edit', compact('audit', 'purchaseOrders'));
    }
    public function update(Request $request, Audit $audit)
    {
        $audit->update($request->all());

        return redirect()->route('app.audits.index')->with('success', 'Audit updated successfully.');
    }
    public function destroy(Audit $audit)
    {
        $audit->delete();

        return redirect()->route('app.audits.index')->with('success', 'Audit deleted successfully.');
    }
}
