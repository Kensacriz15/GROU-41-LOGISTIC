@extends('layouts/layoutMaster')

@section('title', 'Unified Procurement Management System')

@section('content')
<div class="container">
  <h4 class="text-center">Procurement</h4>
  <div class="row">
  <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-gavel fa-3x mb-3"></i>
          <h5 class="card-title">Biddings</h5>
          <p class="card-text">Provide information about ongoing or upcoming bidding processes, including the start and end dates.</p>
          <a href="{{ route('app.biddings.index') }}" class="btn btn-primary">View Biddings</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-user-tie fa-3x mb-3"></i>
          <h5 class="card-title">Vendors</h5>
          <p class="card-text">Display a list of registered vendors with their contact information.</p>
          <a href="{{ route('app.vendors.index') }}" class="btn btn-primary">View Vendors</a>
        </div>
      </div>
    </div>
  <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-file-contract fa-3x mb-3"></i>
          <h5 class="card-title">Contracts</h5>
          <p class="card-text">Show the status of contracts resulting from successful bidding processes.</p>
          <a href="{{ route('app.bids.index') }}" class="btn btn-primary">View Contracts</a>
        </div>
      </div>
    </div>
  </div>
  <h4 class="text-center">Purchase</h4>
  <div class="row mt-4">

  <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-shopping-cart fa-3x mb-3"></i>
          <h5 class="card-title">Purchase Orders</h5>
          <p class="card-text">Highlight the latest purchase orders.</p>
          <a href="{{ route('ppm-public-biddings.index') }}" class="btn btn-primary">View Purchase Orders</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-money-check-alt fa-3x mb-3"></i>
          <h5 class="card-title">Payments</h5>
          <p class="card-text">Display recent payments made for purchase orders.</p>
          <a href="{{ route('ppm-public-biddings.index') }}" class="btn btn-primary">View Payments</a>
        </div>
      </div>
    </div>
  <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-file-invoice-dollar fa-3x mb-3"></i>
          <h5 class="card-title">Invoices</h5>
          <p class="card-text">Show the latest invoices issued by vendors.</p>
          <a href="{{ route('ppm-public-biddings.index') }}" class="btn btn-primary">View Invoices</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-clipboard-check fa-3x mb-3"></i>
          <h5 class="card-title">Audits</h5>
          <p class="card-text">Provide updates on ongoing or completed audits.</p>
          <a href="{{ route('ppm-public-biddings.index') }}" class="btn btn-primary">View Audits</a>
        </div>
      </div>
    </div>
    <h4 class="text-center">Inventory</h4>
  <div class="row mt-4">
  <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-warehouse fa-3x mb-3"></i>
          <h5 class="card-title">Inventories</h5>
          <p class="card-text">Display a list of inventory locations with their names, descriptions, and creation/update dates.</p>
          <a href="{{ route('ppm-public-biddings.index') }}" class="btn btn-primary">View Inventories</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-cubes fa-3x mb-3"></i>
          <h5 class="card-title">Products</h5>
          <p class="card-text">Show a list of products with their names, descriptions, unit prices, and creation/update dates.</p>
          <a href="{{ route('app.products.index') }}" class="btn btn-primary">View Products</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-chart-line fa-3x mb-3"></i>
          <h5 class="card-title">Demand Forecasts</h5>
          <p class="card-text">Showcase the annual and monthly demand forecasts for different products.</p>
          <a href="{{ route('ppm-public-biddings.index') }}" class="btn btn-primary">View Demand Forecasts</a>
        </div>
      </div>
    </div>
  </div>
    <!-- Add more cards for other sections -->
  </div>
</div>
@endsection
