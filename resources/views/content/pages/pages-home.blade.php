@extends('layouts/layoutMaster')

@section('title', 'Unified Procurement Management System')

@section('content')
<div class="container">
  <h4 class="text-center">🔥 Procurement 🔥</h4>
  <div class="row">
    <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-gavel fa-3x mb-3 text-primary"></i>
          <h5 class="card-title text-primary">Biddings</h5>
          <p class="card-text">Get information about ongoing or upcoming bidding processes, including the start and end dates.</p>
          <a href="{{ route('app.biddings.index') }}" class="btn btn-primary rounded-pill">View Biddings</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-user-tie fa-3x mb-3 text-success"></i>
          <h5 class="card-title text-success">Vendors</h5>
          <p class="card-text">Browse through a list of registered vendors along with their contact information.</p>
          <a href="{{ route('app.vendors.index') }}" class="btn btn-success rounded-pill">View Vendors</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-file-contract fa-3x mb-3 text-info"></i>
          <h5 class="card-title text-info">Contracts</h5>
          <p class="card-text">Check the status of contracts resulting from successful bidding processes.</p>
          <a href="{{ route('app.contracts.index') }}" class="btn btn-info rounded-pill">View Contracts</a>
        </div>
      </div>
    </div>
  </div>
  <h4 class="text-center">🛒 Purchase 🛒</h4>
  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-shopping-cart fa-3x mb-3 text-warning"></i>
          <h5 class="card-title text-warning">Purchase Orders</h5>
          <p class="card-text">Stay updated with the latest purchase orders.</p>
          <a href="{{ route('app.purchase_orders.index') }}" class="btn btn-warning rounded-pill">View Purchase Orders</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-money-check-alt fa-3x mb-3 text-danger"></i>
          <h5 class="card-title text-danger">Payments</h5>
          <p class="card-text">Track recent payments made for purchase orders.</p>
          <a href="{{ route('payments.recent') }}" class="btn btn-danger rounded-pill">View Payments</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-file-invoice-dollar fa-3x mb-3 text-primary"></i>
          <h5 class="card-title text-primary">Invoices</h5>
          <p class="card-text">Access the latest invoices issued by vendors.</p>
          <a href="{{ route('app.invoices.index') }}" class="btn btn-primary rounded-pill">View Invoices</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card text-center h-100">
        <div class="card-body">
          <i class="fas fa-clipboard-check fa-3x mb-3 text-success"></i>
          <h5 class="card-title text-success">Audits</h5>
          <p class="card-text">Stay informed about ongoing or completed audits.</p>
          <a href="{{ route('app.audits.index') }}" class="btn btn-success rounded-pill">View Audits</a>
        </div>
      </div>
    </div>
    <h4 class="text-center">📦 Inventory 📦</h4>
    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card text-center h-100">
          <div class="card-body">
            <i class="fas fa-warehouse fa-3x mb-3 text-info"></i>
            <h5 class="card-title text-info">Inventories</h5>
            <p class="card-text">Explore a list of inventory locations along with their names, descriptions, and creation/update dates.</p>
            <a href="{{ route('app.inventories.index') }}" class="btn btn-info rounded-pill">View Inventories</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card text-center h-100">
          <div class="card-body">
            <i class="fas fa-cubes fa-3x mb-3 text-warning"></i>
            <h5 class="card-title text-warning">Products</h5>
            <p class="card-text">Discover a variety of products with their names, descriptions, unit prices, and creation/update dates.</p>
            <a href="{{ route('app.products.index') }}" class="btn btn-warning rounded-pill">View Products</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center h-100">
          <div class="card-body">
            <i class="fas fa-chart-line fa-3x mb-3 text-danger"></i>
            <h5 class="card-title text-danger">Demand Forecasts</h5>
            <p class="card-text">Get insights into the annual and monthly demand forecasts for different products.</p>
            <a href="{{ route('app.products.index') }}" class="btn btn-danger rounded-pill">View Demand Forecasts</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
