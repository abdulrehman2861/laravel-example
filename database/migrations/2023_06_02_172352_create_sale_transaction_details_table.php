<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sale_transaction_details', function (Blueprint $table) {
            $table->id();
            $table->decimal('rate', $total = 8, $places = 2)->default(0.00);
            $table->bigInteger('quantity')->default(0);
            $table->decimal('discount', $total = 8, $places = 2)->default(0.00);
            $table->decimal('tax', $total = 8, $places = 2)->default(0.00);

            $table->foreignId('product_id')
                    ->constrained('products')
                    ->onDelete('restrict');

            $table->foreignId('sale_transaction_id')
                    ->constrained('sale_transactions')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_transaction_details');
    }
};
