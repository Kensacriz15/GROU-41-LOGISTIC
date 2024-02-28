<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\PublicBidding;
use App\Http\Controllers\pages\SmallValueProcurement;
use App\Http\Controllers\pages\InventoryforSaleLease;
use App\Http\Controllers\pages\CreatePurchaseOrder;
use App\Http\Controllers\pages\PurchaseOrderList;
use App\Http\Controllers\pages\AllInventory;
use App\Http\Controllers\pages\MROInventory;
use App\Http\Controllers\pages\RequestHistory;
use App\Http\Controllers\pages\ApprovalWorkflow;
use App\Http\Controllers\pages\PendingApproval;
use App\Http\Controllers\pages\ReturnedInventory;
use App\Http\Controllers\pages\Locations;
use App\Http\Controllers\pages\ItemsManagementAdd;
use App\Http\Controllers\pages\ItemsManagementList;
use App\Http\Controllers\pages\Reorder;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\PpmPublicBiddingController;
use App\Http\Controllers\PpmSmallValueProcurementController;
//UNNFIED PPM CONTROLLER
use App\Http\Controllers\BiddingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductInventoryController;
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
Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
// Procurement Public Bidding
Route::get('/ppm-public-biddings', [PpmPublicBiddingController::class, 'index'])->name('ppm-public-biddings.index');
Route::get('/ppm-public-biddings/create', [PpmPublicBiddingController::class, 'create'])->name(
  'ppm-public-biddings.create'
);
Route::post('/ppm-public-biddings', [PpmPublicBiddingController::class, 'store'])->name('ppm-public-biddings.store');
Route::get('/ppm-public-biddings/{publicBidding}', [PpmPublicBiddingController::class, 'show'])->name(
  'ppm-public-biddings.show'
);
Route::get('/ppm-public-biddings/{publicBidding}/edit', [PpmPublicBiddingController::class, 'edit'])->name(
  'ppm-public-biddings.edit'
);
Route::put('/ppm-public-biddings/{publicBidding}', [PpmPublicBiddingController::class, 'update'])->name(
  'ppm-public-biddings.update'
);
Route::delete('/ppm-public-biddings/{publicBidding}', [PpmPublicBiddingController::class, 'destroy'])->name(
  'ppm-public-biddings.destroy'
);
// Procurement Small Value Procurement
Route::get('ppm-small-value-procurement', [PpmSmallValueProcurementController::class, 'index'])->name(
  'ppm-small-value-procurements.index'
);
Route::get('/ppm-small-value-procurements/create', [PpmSmallValueProcurementController::class, 'create'])->name(
  'ppm-small-value-procurements.create'
);
Route::post('/ppm-small-value-procurements', [PpmSmallValueProcurementController::class, 'store'])->name(
  'ppm-small-value-procurements.store'
);
Route::get('/ppm-small-value-procurements/{id}', [PpmSmallValueProcurementController::class, 'show'])->name(
  'ppm-small-value-procurements.show'
);
Route::get('/ppm-small-value-procurements/{id}/edit', [PpmSmallValueProcurementController::class, 'edit'])->name(
  'ppm-small-value-procurements.edit'
);
Route::put('/ppm-small-value-procurements/{id}', [PpmSmallValueProcurementController::class, 'update'])->name(
  'ppm-small-value-procurements.update'
);
Route::delete('/ppm-small-value-procurements/{id}', [PpmSmallValueProcurementController::class, 'destroy'])->name(
  'ppm-small-value-procurements.destroy'
);
//EXIT

//UNIFIED PPM
Route::resource('biddings', BiddingController::class);
Route::get('/biddings/{bidding}', [BiddingController::class, 'show'])->name('app.biddings.show');
Route::get('/biddings/{bidding}', [BiddingController::class, 'show'])->name('biddings.show');
Route::get('/biddings', [BiddingController::class, 'index'])->name('app.biddings.index');
Route::get('/biddings/{bidding}', [BiddingController::class, 'show'])->name('biddings.show');
Route::get('/biddings/{id}', [BiddingController::class, 'show'])->name('app.biddings.show');

Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('app.products.index');
Route::get('/app/products/{product}', [ProductController::class, 'show'])->name('app.products.show');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('app.products.destroy');

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
//EXIT PPM

// Purchase
Route::get('/pages-create-purchase-order', [CreatePurchaseOrder::class, 'index'])->name('pages-create-purchase-order');
Route::get('/pages-purchase-order-list', [PurchaseOrderList::class, 'index'])->name('pages-purchase-order-list');
// Inventory
Route::get('/pages-all-inventory', [AllInventory::class, 'index'])->name('pages-all-inventory');
Route::get('/pages-mro-inventory', [MROInventory::class, 'index'])->name('pages-mro-inventory');
Route::get('/pages-request-history', [RequestHistory::class, 'index'])->name('pages-request-history');
Route::get('/pages-approval-workflow', [ApprovalWorkflow::class, 'index'])->name('pages-approval-workflow');

Route::get('/pages-pending-approval', [PendingApproval::class, 'index'])->name('pages-pending-approval');
Route::get('/pages-returned-inventory', [ReturnedInventory::class, 'index'])->name('pages-returned-inventory');
Route::get('/pages-locations', [Locations::class, 'index'])->name('pages-locations');
Route::get('/pages-items-management-add', [ItemsManagementAdd::class, 'index'])->name('pages-items-management-add');
Route::get('/pages-items-management-list', [ItemsManagementList::class, 'index'])->name('pages-items-management-list');
Route::get('/pages-reorder', [Reorder::class, 'index'])->name('pages-pages-reorder');
// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
