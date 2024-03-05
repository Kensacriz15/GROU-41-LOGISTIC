<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentDetailsToInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->decimal('total_due', 10, 2)->after('discount')->default(0);
            $table->string('bank_name')->after('total_due')->default('Bank Name Placeholder');
            $table->string('country')->after('bank_name')->default('Country Name');
            $table->string('iban')->after('country')->default('Iban');
            $table->string('swift_code')->after('iban')->default('Swiftcode');
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('total_due');
            $table->dropColumn('bank_name');
            $table->dropColumn('country');
            $table->dropColumn('iban');
            $table->dropColumn('swift_code');
        });
    }
}
