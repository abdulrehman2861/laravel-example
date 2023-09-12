<?php

use App\Models\SaleTransaction;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sale_transactions', function (Blueprint $table) {
            $table->decimal('discount', 10, 2)->nullable()->change();
            $table->decimal('shipping', 10, 2)->nullable()->change();
            $table->enum('tax_type',SaleTransaction::ALL_TAX_TYPES)->nullable()->change();
            $table->decimal('order_tax', 10, 2)->nullable()->change();
            $table->enum('service_type',SaleTransaction::ALL_SERVICE_TYPES)->nullable()->change();
            $table->enum('appointment_time',SaleTransaction::ALL_APPOINTMENT_TIMES)->nullable()->change();
            $table->unsignedBigInteger('installer_id')->nullable()->change();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_transactions', function (Blueprint $table) {
            $table->decimal('discount', 10, 2)->nullable(false)->change();
            $table->decimal('shipping', 10, 2)->nullable(false)->change();
            $table->enum('tax_type',SaleTransaction::ALL_TAX_TYPES)->nullable(false)->change();
            $table->decimal('order_tax', 10, 2)->nullable(false)->change();
            $table->enum('service_type',SaleTransaction::ALL_SERVICE_TYPES)->nullable(false)->change();
            $table->enum('appointment_time',SaleTransaction::ALL_APPOINTMENT_TIMES)->nullable(false)->change();
            $table->unsignedBigInteger('installer_id')->nullable(false)->change();


        });
    }
};
