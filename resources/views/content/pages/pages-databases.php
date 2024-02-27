use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnifiedProcurementManagementSystemTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Products table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('unit_price', 10, 2);
            $table->timestamps();
        });

        // Inventories table
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        // ProductInventory table
        Schema::create('product_inventory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('inventory_id');
            $table->integer('quantity');
            $table->integer('reorder_level');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('inventory_id')->references('id')->on('inventories');
        });

        // DemandForecastAnnual table
        Schema::create('demand_forecast_annual', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->year('year');
            $table->integer('january');
            $table->integer('february');
            // ... add additional months
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });

        // DemandForecastMonthly table
        Schema::create('demand_forecast_monthly', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->year('year');
            $table->integer('month');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });

        // BudgetRequests table
        Schema::create('budget_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('total_cost', 10, 2);
            $table->text('justification');
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });

        // Biddings table
        Schema::create('biddings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });

        // Bids table
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bidding_id');
            $table->unsignedBigInteger('vendor_id');
            $table->decimal('price', 10, 2);
            $table->integer('delivery_time');
            $table->text('terms_and_conditions');
            $table->timestamps();

            $table->foreign('bidding_id')->references('id')->on('biddings');
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });

        // Vendors table
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('website')->nullable();
            $table->timestamps();
        });

        // Contracts table
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bidding_id');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->dateTime('delivery_date');
            $table->text('payment_terms');
            $table->enum('status', ['pending', 'active', 'completed', 'terminated']);
            $table->timestamps();

            $table->foreign('bidding_id')->references('id')->on('biddings');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreign('product_id')->references('id')->on('products');
        });

        // PurchaseOrders table
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id');
            $table->integer('quantity');
            $table->dateTime('delivery_date');
            $table->timestamps();

            $table->foreign('contract_id')->references('id')->on('contracts');
        });

        // Payments table
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_order_id');
            $table->decimal('amount', 10, 2);
            $table->dateTime('payment_date');
            $table->enum('payment_method', ['cash', 'cheque', 'bank transfer']);
            $table->timestamps();

            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
        });

        // Invoices table
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('purchase_order_id');
            $table->decimal('amount', 10, 2);
            $table->dateTime('invoice_date');
            $table->dateTime('due_date');
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
        });

        // Audits table
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_order_id');
            $table->text('description');
            $table->enum('status', ['pending', 'completed']);
            $table->timestamps();

            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists
