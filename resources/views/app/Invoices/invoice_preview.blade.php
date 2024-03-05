@extends('layouts/layoutMaster')

@section('title', 'Invoice_Preview')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-invoice.css')}}" />
@endsection

@section('page-script')
<script src="{{asset('assets/js/offcanvas-add-payment.js')}}"></script>
<script src="{{asset('assets/js/offcanvas-send-invoice.js')}}"></script>
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
@endsection

@section('content')

<div class="row invoice-preview">
  <!-- Invoice -->
  <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
    <div class="card invoice-preview-card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
          <div class="mb-xl-0 mb-4">
            <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
              <div class="mt-4"><img src="{{ asset('assets\img\favicon\bbox-express-logo-audit.png') }}" alt="logo" width="100" height="" ></div>
              <span class="app-brand-text fw-bold fs-4">
                {{ config('variables.templateName') }}
              </span>
            </div>
            <p class="mb-2">17C Franscico St, Canumay West</p>
            <p class="mb-2">Valenzuela City, 1443, PH</p>
            <p class="mb-0">0910XXXXXXX</p>
          </div>
          <div>
            <h4 class="fw-medium mb-2">INVOICE #86423</h4>
            <div class="mb-2 pt-1">
              <span>Date Issues:</span>
              <span class="fw-medium">April 25, 2021</span>
            </div>
            <div class="pt-1">
              <span>Date Due:</span>
              <span class="fw-medium">May 25, 2021</span>
            </div>
          </div>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <div class="row p-sm-3 p-0">
          <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
            <h6 class="mb-3">Invoice To:</h6>
            <p class="mb-1">{{ $invoice->vendor->name }}</p>
<p class="mb-1">{{ $invoice->vendor->company }}</p>
<p class="mb-1">{{ $invoice->vendor->address }}</p>
<p class="mb-1">{{ $invoice->vendor->phone }}</p>
<p class="mb-0">{{ $invoice->vendor->email }}</p>
          </div>
          <div class="col-xl-6 col-md-12 col-sm-7 col-12">
            <h6 class="mb-4">Bill To:</h6>
            <table>
              <tbody>
                <tr>
                <td class="pe-4">Total Due:</td>
<td class="fw-medium">₱{{ $invoice->total_due }}</td>
                </tr>
                <tr>
                <td class="pe-4">Bank name:</td>
<td>{{ $invoice->bank_name }}</td>
                </tr>
                <tr>
                <td class="pe-4">Country:</td>
<td>{{ $invoice->country }}</td>
                </tr>
                <tr>
                <td class="pe-4">IBAN:</td>
<td>{{ $invoice->iban }}</td>
                </tr>
                <tr>
                <td class="pe-4">SWIFT code:</td>
<td>{{ $invoice->swift_code }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="table-responsive border-top">
  <table class="table m-0">
  <table>
    <thead>
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
            <td>{{ $item->price }}</td>
            <td>{{ $item->quantity * $item->price}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<tr>
  <td colspan="3" class="align-top px-4 py-4">
    <p class="mb-2 mt-3">
      <span class="ms-3 fw-medium">Salesperson:</span>
      <span>Alfie Solomons</span>
    </p>
    <span class="ms-3">Thanks for your business</span>
  </td>
  <td class="text-end pe-3 py-4">
    <p class="mb-2 pt-3">Subtotal:</p>
    <p class="mb-2">Discount:</p>
    <p class="mb-2">Tax:</p>
    <p class="mb-0 pb-3">Total:</p>
  </td>
  <td class="ps-2 py-4">
    <p class="fw-medium mb-2 pt-3">₱{{ number_format($invoice->subtotal, 2) }}</p>
    <p class="fw-medium mb-2">₱{{ number_format($invoice->discount, 2) }}</p>
    <p class="fw-medium mb-2">₱{{ number_format($invoice->tax, 2) }}</p>
    <p class="fw-medium mb-0 pb-3">₱{{ number_format($invoice->total, 2) }}</p>
  </td>
</tr>
    </tbody>
  </table>
</div>
  <!-- /Invoice -->

  <!-- Invoice Actions -->
  <div class="col-xl-3 col-md-4 col-12 invoice-actions">
    <div class="card">
      <div class="card-body">
        <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-send ti-xs me-2"></i>Send Invoice</span>
        </button>
        <button class="btn btn-label-secondary d-grid w-100 mb-2">
          Download
        </button>
        <a class="btn btn-label-secondary d-grid w-100 mb-2" target="_blank" href="{{url('app/invoice/print')}}">
          Print
        </a>
        <a href="{{url('app/invoice/edit')}}" class="btn btn-label-secondary d-grid w-100 mb-2">
          Edit Invoice
        </a>
        <button class="btn btn-primary d-grid w-100" data-bs-toggle="offcanvas" data-bs-target="#addPaymentOffcanvas">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-currency-peso ti-xs me-2"></i>Add Payment</span>
        </button>
      </div>
    </div>
  </div>
  <!-- /Invoice Actions -->
</div>

<!-- Offcanvas -->

<!-- /Offcanvas -->
@endsection
