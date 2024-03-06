<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Bidding;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class HomePage extends Controller
{
  public function index()
  {
      if (auth()->guest()) {
          return redirect()->route('login');
      }

      return view('content.pages.pages-home');
  }
}

