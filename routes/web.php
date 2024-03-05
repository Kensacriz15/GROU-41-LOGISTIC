<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
//UNNFIED PPM CONTROLLER
use App\Http\Controllers\BiddingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductInventoryController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\AuditsController;
use App\Http\Controllers\QualityStandardsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Main Page Route
Route::get('/', [HomePage::class, 'index'])->name('pages-home');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);


//UNIFIED PPM
Route::resource('biddings', BiddingController::class);
Route::get('/biddings', [BiddingController::class, 'index'])->name('app.biddings.index');
Route::get('/biddings/create', [BiddingController::class, 'create'])->name('app.biddings.create');
Route::post('/biddings', [BiddingController::class, 'store'])->name('app.biddings.store');
Route::get('/biddings/{id}', [BiddingController::class, 'show'])->name('app.biddings.show');
Route::get('/biddings/{bidding}/edit', [BiddingController::class, 'edit'])->name('app.biddings.edit');
Route::put('/biddings/{bidding}', [BiddingController::class, 'update'])->name('app.biddings.update');
Route::delete('/biddings/{bidding}', [BiddingController::class, 'destroy'])->name('app.biddings.destroy');

Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('app.products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('app.products.create');
Route::post('/products', [ProductController::class, 'store'])->name('app.products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('app.products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('app.products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('app.products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('app.products.destroy');

Route::resource('/product_categories', ProductCategoryController::class);
Route::get('/product_categories', [ProductCategoryController::class, 'index'])->name('app.product_categories.index');
Route::get('/product_categories/create', [ProductCategoryController::class, 'create'])->name('app.product_categories.create');
Route::post('/product_categories', [ProductCategoryController::class, 'store'])->name('app.product_categories.store');
Route::get('/product_categories/{productcategory}', [ProductCategoryController::class, 'show'])->name('app.product_categories.show');
Route::get('product_categories/{productcategory}/edit', [ProductCategoryController::class, 'edit'])->name('app.product_categories.edit');
Route::put('/product_categories/{productcategory}', [ProductCategoryController::class, 'update'])->name('app.product_categories.update');
Route::delete('/product_categories/{productcategory}', [ProductCategoryController::class, 'destroy'])->name('app.product_categories.destroy');

Route::get('/bids/{bid}/make-winner', [BidController::class, 'makeWinner'])->name('app.bids.makeWinner');
Route::get('/bids/winning-bids', [BidController::class, 'showWinningBids'])->name('app.bids.winningBids');
Route::post('/bids/create-line-items', [BidController::class, 'createLineItems'])->name('app.bids.createLineItems');
Route::resource('bids', BidController::class);
Route::get('/bids', [BidController::class, 'index'])->name('app.bids.index');
Route::get('/bids/create', [BidController::class, 'create'])->name('app.bids.create');
Route::post('/bids', [BidController::class, 'store'])->name('app.bids.store');
Route::get('/bids/{bid}', [BidController::class, 'show'])->name('app.bids.show');
Route::get('/bids/{bid}/edit', [BidController::class, 'edit'])->name('app.bids.edit');
Route::put('/bids/{bid}', [BidController::class, 'update'])->name('app.bids.update');
Route::delete('/bids/{bid}', [BidController::class, 'destroy'])->name('app.bids.destroy');

Route::resource('vendors', VendorController::class);
Route::get('/vendors', [VendorController::class, 'index'])->name('app.vendors.index');
Route::get('/vendors/create', [VendorController::class, 'create'])->name('app.vendors.create');
Route::post('/vendors', [VendorController::class, 'store'])->name('app.vendors.store');
Route::get('/vendors/{vendor}', [VendorController::class, 'show'])->name('app.vendors.show');
Route::get('/vendors/{vendor}/edit', [VendorController::class, 'edit'])->name('app.vendors.edit');
Route::put('/vendors/{vendor}', [VendorController::class, 'update'])->name('app.vendors.update');
Route::delete('/vendors/{vendor}', [VendorController::class, 'destroy'])->name('app.vendors.destroy');

Route::resource('contracts', ContractController::class);
Route::get('/contracts', [ContractController::class, 'index'])->name('app.contracts.index');
Route::get('/contracts/create', [ContractController::class, 'create'])->name('app.contracts.create');
Route::post('/contracts', [ContractController::class, 'store'])->name('app.contracts.store');
Route::get('/contracts/{contract}', [ContractController::class, 'show'])->name('app.contracts.show');
Route::get('/contracts/{contract}/edit', [ContractController::class, 'edit'])->name('app.contracts.edit');
Route::put('/contracts/{contract}', [ContractController::class, 'update'])->name('app.contracts.update');
Route::delete('/contracts/{contract}', [ContractController::class, 'destroy'])->name('app.contracts.destroy');

Route::resource('inventories', InventoryController::class);
Route::get('/inventories', [InventoryController::class, 'index'])->name('app.inventories.index');
Route::get('/inventories/create', [InventoryController::class, 'create'])->name('app.inventories.create');
Route::post('/inventories', [InventoryController::class, 'store'])->name('app.inventories.store');
Route::get('/inventories/{inventory}', [InventoryController::class, 'show'])->name('app.inventories.show');
Route::get('/inventories/{inventory}/edit', [InventoryController::class, 'edit'])->name('app.inventories.edit');
Route::put('/inventories/{inventory}', [InventoryController::class, 'update'])->name('app.inventories.update');
Route::delete('/inventories/{inventory}', [InventoryController::class, 'destroy'])->name('app.inventories.destroy');

Route::resource('product_inventories', ProductInventoryController::class);
Route::get('/product_inventories', [ProductInventoryController::class, 'index'])->name('app.product_inventories.index');
Route::get('/product_inventories/create', [ProductInventoryController::class, 'create'])->name('app.product_inventories.create');
Route::post('/product_inventories', [ProductInventoryController::class, 'store'])->name('app.product_inventories.store');
Route::get('/product_inventories/{productinventory}', [ProductInventoryController::class, 'show'])->name('app.product_inventories.show');
Route::get('/product_inventories/{productInventory}/edit', [ProductInventoryController::class, 'edit'])->name('app.product_inventories.edit');
Route::put('/product_inventories/{productinventory}', [ProductInventoryController::class, 'update'])->name('app.product_inventories.update');
Route::delete('/product_inventories/{productinventory}', [ProductInventoryController::class, 'destroy'])->name('app.product_inventories.destroy');
Route::get('/product-inventories/{productInventory}', [ProductInventoryController::class, 'show']);

Route::resource('purchase_orders', PurchaseOrderController::class);
Route::get('/purchase_orders', [PurchaseOrderController::class, 'index'])->name('app.purchase_orders.index');
Route::get('/purchase_orders/create', [PurchaseOrderController::class, 'create'])->name('app.purchase_orders.create');
Route::post('/purchase_orders', [PurchaseOrderController::class, 'store'])->name('app.purchase_orders.store');
Route::get('/purchase_orders/{purchaseOrder}', [PurchaseOrderController::class, 'show'])->name('app.purchase_orders.show');
Route::get('/purchase_orders/{purchaseOrder}/edit', [PurchaseOrderController::class, 'edit'])->name('app.purchase_orders.edit');
Route::put('/purchase_orders/{purchaseOrder}', [PurchaseOrderController::class, 'update'])->name('app.purchase_orders.update');
Route::delete('/purchase_orders/{purchaseOrder}', [PurchaseOrderController::class, 'destroy'])->name('app.purchase_orders.destroy');
Route::get('/payments/recent', [PaymentsController::class, 'showRecentPayments'])->name('payments.recent');
Route::get('/payments/demo', function () {return view('app.payments.demo');});
Route::post('/payments/update-payment', [PaymentsController::class, 'updatePayment']);

Route::get('/invoices/preview', [InvoicesController::class, 'showTemplate'])->name('app.invoices.invoice_preview');
Route::get('/invoices/generate_pdf/{invoice}', [InvoicesController::class, 'generateInvoicePDF'])->name('app.invoices.generatePDF');
Route::resource('invoices', InvoicesController::class);
Route::get('/invoices', [InvoicesController::class, 'index'])->name('app.invoices.index');
Route::get('/invoices/create', [InvoicesController::class, 'create'])->name('app.invoices.create');
Route::post('/invoices', [InvoicesController::class, 'store'])->name('app.invoices.store');
Route::get('/invoices/{invoice}', [InvoicesController::class, 'show'])->name('app.invoices.show');
Route::get('/invoices/{invoice}/edit', [InvoicesController::class, 'edit'])->name('app.invoices.edit');
Route::put('/invoices/{invoice}', [InvoicesController::class, 'update'])->name('app.invoices.update');
Route::delete('/invoices/{invoice}', [InvoicesController::class, 'destroy'])->name('app.invoices.destroy');

Route::resource('audits', AuditsController::class);
Route::get('/audits', [AuditsController::class, 'index'])->name('app.audits.index');
Route::get('/audits/create', [AuditsController::class, 'create'])->name('app.audits.create');
Route::post('/audits', [AuditsController::class, 'store'])->name('app.audits.store');
Route::get('/audits/{audit}', [AuditsController::class, 'show'])->name('app.audits.show');
Route::get('/audits/{audit}/edit', [AuditsController::class, 'edit'])->name('app.audits.edit');
Route::put('/audits/{audit}', [AuditsController::class, 'update'])->name('app.audits.update');
Route::delete('/audits/{audit}', [AuditsController::class, 'destroy'])->name('app.audits.destroy');

Route::get('/DemandForecasts/quality-standards', [QualityStandardsController::class, 'index'])->name('app.DemandForecasts.quality-standard');


//EXIT PPM

// authentication


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
