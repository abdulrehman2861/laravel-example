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
        Schema::create('sale_transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('transaction_type',SaleTransaction::ALL_TRANSACTION_TYPES);
            $table->enum('service_type',SaleTransaction::ALL_SERVICE_TYPES);
            $table->enum('appointment_time',SaleTransaction::ALL_APPOINTMENT_TIMES);
            $table->date('appointment_date')->nullable();
            $table->string('quotation_no')->nullable();
            $table->string('sale_order_no')->nullable();
            $table->enum('status',SaleTransaction::ALL_TRANSACTION_STATUS);
            $table->enum('payment_status',SaleTransaction::ALL_PAYMENT_STATUS)->default(SaleTransaction::PAYMENT_STATUS_UNPAID);
            $table->longText('note')->nullable();

            $table->decimal('discount', $total = 8, $places = 2)->default(0.00);
            $table->decimal('shipping', $total = 8, $places = 2)->default(0.00);
            $table->enum('tax_type',SaleTransaction::ALL_TAX_TYPES);
            $table->decimal('order_tax', $total = 8, $places = 2)->default(0.00);

            $table->foreignId('installer_id')
                    ->constrained('installers')
                    ->onDelete('restrict');

            $table->foreignId('customer_id')
                    ->constrained('customers')
                    ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_transactions');
    }
};
