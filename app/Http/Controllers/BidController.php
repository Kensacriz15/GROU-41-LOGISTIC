<?php

namespace App\Http\Controllers;

use App\Models\Bidding;
use App\Models\Product;
use Illuminate\Http\Request;

class BidController extends Controller
{
  public function index()
  {
    $biddings = Bidding::all();
    return view('app.bids.index', compact('biddings'));
  }

  public function create()
  {
    $products = Product::all();
    return view('app.bids.create', compact('products'));
  }

  public function store(Request $request)
  {
    $bidding = Bidding::create($request->all());
    return redirect()->route('app.bids.show', $bidding->id);
  }

  public function show($id)
  {
    $bidding = Bidding::findOrFail($id);
    return view('app.bids.show', compact('bidding'));
  }

  public function edit($id)
  {
    $bidding = Bidding::findOrFail($id);
    return view('app.bids.edit', compact('bidding'));
  }

  public function update(Request $request, $id)
  {
    $bidding = Bidding::findOrFail($id);
    $bidding->update($request->all());
    return redirect()->route('app.bids.show', $bidding->id);
  }

  public function destroy($id)
  {
    $bidding = Bidding::findOrFail($id);
    $bidding->delete();
    return redirect()->route('app.bids.index');
  }
}
