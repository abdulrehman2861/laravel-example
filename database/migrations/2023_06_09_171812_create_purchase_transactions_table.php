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
        Schema::create('purchase_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('issue_date');
            $table->date('expected_receipt_date');
            $table->enum('status',PurchaseTransaction::ALL_TRANSACTION_STATUS);
            $table->enum('payment_method',PurchaseTransaction::ALL_PAYMENT_METHOD_TYPES);
            $table->decimal('amount_paid', $total = 8, $places = 2)->default(0.00);
            $table->text('billing_address')->nullable();
            $table->text('shipping_address')->nullable();

            $table->decimal('discount', $total = 8, $places = 2)->default(0.00);
            $table->decimal('shipping', $total = 8, $places = 2)->default(0.00);
            $table->enum('tax_type',PurchaseTransaction::ALL_TAX_TYPES);
            $table->decimal('order_tax', $total = 8, $places = 2)->default(0.00);

            $table->longText('external_note')->nullable();
            $table->longText('internal_note')->nullable();

            $table->foreignId('supplier_id')
                    ->constrained('suppliers')
                    ->onDelete('restrict');

            $table->foreignId('ship_to_warehouse_id')
                    ->constrained('warehouses')
                    ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_transactions');
    }
};
