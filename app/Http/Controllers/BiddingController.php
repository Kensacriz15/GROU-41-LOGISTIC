<?php

namespace App\Http\Controllers;
use App\Models\Bidding;
use App\Models\Product;
use Illuminate\Http\Request;

class BiddingController extends Controller
{
  public function index(Request $request)
  {
    $search_term = $request->input('search');

    $biddings = Bidding::with('product');

    if ($search_term) {
        $biddings = $biddings->where('name', 'LIKE', "%{$search_term}%") 
                              ->orWhereHas('product', function($query) use ($search_term) {
                                  $query->where('name', 'LIKE', "%{$search_term}%");
                              }); 
    }

    $biddings = $biddings->get();
    $biddings = Bidding::with('product')->get();
    return view('app.biddings.index', compact('biddings'));
  }

  public function create()
  {
    $products = Product::all();
    return view('app.biddings.create', compact('products'));
  }

  public function store(Request $request)
  {
    $bidding = Bidding::create($request->all());
    return redirect()->route('app.biddings.show', $bidding->id);
  }

  public function show($id)
  {
    $bidding = Bidding::findOrFail($id);
    return view('app.biddings.show', compact('bidding'));
  }

  public function edit($id)
  {
    $bidding = Bidding::findOrFail($id);
    $products = Product::all();
    return view('app.biddings.edit', compact('bidding', 'products'));
  }

  public function update(Request $request, $id)
  {
    $bidding = Bidding::findOrFail($id);
    $bidding->update($request->all());
    return redirect()->route('app.biddings.show', $bidding->id);
  }

  public function destroy($id)
  {
    $bidding = Bidding::findOrFail($id);
    $bidding->delete();
    return redirect()->route('app.biddings.index');
  }
}
