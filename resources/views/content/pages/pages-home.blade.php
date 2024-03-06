@extends('layouts/layoutMaster')

@section('title', 'Unified Procurement Management System')

@section('content')
<div class="container ">
  <div class="row">
    <div class="col-sm-12">
      <div class="card text-center bg-light mb-4">
        <div class="card-body">
          <h4 class="card-title"> Procurement </h4>
          <div class="row">
            <div class="col-md-4">
              <div class="card text-center h-100 bg-primary">
                <div class="card-body">
                  <i class="fas fa-gavel fa-3x mb-3 text-white"></i>
                  <h5 class="card-title text-white">Biddings</h5>
                  <p class="card-text text-white">Get information about ongoing or upcoming bidding processes, including the start and end dates.</p>
                  <a href="{{ route('app.biddings.index') }}" class="btn btn-light rounded-pill">View Biddings</a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card text-center h-100 bg-success">
                <div class="card-body">
                  <i class="fas fa-user-tie fa-3x mb-3 text-white"></i>
                  <h5 class="card-title text-white">Vendors</h5>
                  <p class="card-text text-white">Browse through a list of registered vendors along with their contact information.</p>
                  <a href="{{ route('app.vendors.index') }}" class="btn btn-light rounded-pill">View Vendors</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card text-center h-100 bg-info">
                <div class="card-body">
                  <i class="fas fa-file-contract fa-3x mb-3 text-white"></i>
                  <h5 class="card-title text-white">Contracts</h5>
                  <p class="card-text text-white">Check the status of contracts resulting from successful bidding processes.</p>
                  <a href="{{ route('app.contracts.index') }}" class="btn btn-light rounded-pill">View Contracts</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="card text-center bg-light mb-4">
        <div class="card-body">
          <h4 class="card-title"> Purchase </h4>
          <div class="row mt-3">
            <div class="col-md-4">
              <div class="card text-center h-100 bg-warning">
                <div class="card-body">
                  <i class="fas fa-shopping-cart fa-3x mb-3 text-white"></i>
                  <h5 class="card-title text-white">Purchase Orders</h5>
                  <p class="card-text text-white">Stay updated with the latest purchase orders.</p>
                  <a href="{{ route('app.purchase_orders.index') }}" class="btn btn-light rounded-pill">View Purchase Orders</a>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card text-center h-100 bg-danger">
                <div class="card-body">
                  <i class="fas fa-money-check-alt fa-3x mb-3 text-white"></i>
                  <h5 class="card-title text-white">Payments</h5>
                  <p class="card-text text-white">Track recent payments made for purchase orders.</p>
                  <a href="{{ route('app.payments.recent') }}" class="btn btn-light rounded-pill">View Payments</a>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card text-center h-100 bg-success">
                <div class="card-body">
                  <i class="fas fa-file-invoice-dollar fa-3x mb-3 text-white"></i>
                  <h5 class="card-title text-white">Audits</h5>
                  <p class="card-text text-white">Stay informed about ongoing or completed audits.</p>
                  <a href="{{ route('app.audits.index') }}" class="btn btn-light rounded-pill">View Audits</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card text-center h-100 bg-primary">
                <div class="card-body">
                  <i class="fas fa-file-invoice-dollar fa-3x mb-3 text-white"></i>
                  <h5 class="card-title text-white">Invoices</h5>
                  <p class="card-text text-white">Access the latest invoices issued by vendors.</p>
                  <a href="{{ route('app.invoices.index') }}" class="btn btn-light rounded-pill">View Invoices</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card text-center bg-light">
        <div class="card-body">
          <h4 class="card-title"> Inventory </h4>
          <div class="row mt-4" >
            <div class="col-md-4">
              <div class="card text-center h-100 bg-info">
                <div class="card-body">
                  <i class="fas fa-warehouse fa-3x mb-3 text-white"></i>
                  <h5 class="card-title text-white">Inventories</h5>
                  <p class="card-text text-white">Explore a list of inventory locations along with their names, descriptions, and creation/update dates.</p>
                  <a href="{{ route('app.inventories.index') }}" class="btn btn-light rounded-pill">View Inventories</a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card text-center h-100 bg-warning">
                <div class="card-body">
                  <i class="fas fa-cubes fa-3x mb-3 text-white"></i>
                  <h5 class="card-title text-white">Products</h5>
                  <p class="card-text text-white">Discover a variety of products with their names, descriptions, unit prices, and creation/update dates.</p>
                  <a href="{{ route('app.products.index') }}" class="btn btn-light rounded-pill">View Products</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card text-center h-100 bg-danger">
                <div class="card-body">
                  <i class="fas fa-chart-line fa-3x mb-3 text-white"></i>
                  <h5 class="card-title text-white">Demand Forecasts</h5>
                  <p class="card-text text-white">Get insights into the annual and monthly demand forecasts for different products.</p>
                  <a href="{{ route('app.DemandForecasts.quality-standard') }}" class="btn btn-light rounded-pill">View Demand Forecasts</a>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection
