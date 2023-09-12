<?php

use App\Models\PurchaseTransaction;
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
        Schema::table('purchase_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('supplier_id')->nullable()->change();
            $table->date('issue_date')->nullable()->change();
            $table->date('expected_receipt_date')->nullable()->change();
            $table->enum('status', PurchaseTransaction::ALL_TRANSACTION_STATUS)->nullable()->change();
            $table->unsignedBigInteger('ship_to_warehouse_id')->nullable()->change();
            $table->enum('payment_method', PurchaseTransaction::ALL_PAYMENT_METHOD_TYPES)->nullable()->change();
            $table->text('billing_address')->nullable()->change();
            $table->text('shipping_address')->nullable()->change();
            $table->decimal('discount', $total = 8, $places = 2)->nullable()->change();
            $table->decimal('shipping', $total = 8, $places = 2)->nullable()->change();
            $table->decimal('order_tax', $total = 8, $places = 2)->nullable()->change();
            $table->enum('tax_type', PurchaseTransaction::ALL_TAX_TYPES)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('supplier_id')->nullable(false)->change();
            $table->date('issue_date')->nullable(false)->change();
            $table->date('expected_receipt_date')->nullable(false)->change();
            $table->enum('status', PurchaseTransaction::ALL_TRANSACTION_STATUS)->nullable(false)->change();
            $table->unsignedBigInteger('ship_to_warehouse_id')->nullable(false)->change();
            $table->enum('payment_method', PurchaseTransaction::ALL_PAYMENT_METHOD_TYPES)->nullable(false)->change();
            $table->text('billing_address')->nullable(false)->change();
            $table->text('shipping_address')->nullable(false)->change();
            $table->decimal('discount', $total = 8, $places = 2)->nullable(false)->change();
            $table->decimal('shipping', $total = 8, $places = 2)->nullable(false)->change();
            $table->decimal('order_tax', $total = 8, $places = 2)->nullable(false)->change();
            $table->enum('tax_type', PurchaseTransaction::ALL_TAX_TYPES)->nullable(false)->change();
        });
    }
};
