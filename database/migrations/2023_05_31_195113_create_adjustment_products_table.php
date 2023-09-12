<?php

use App\Models\AdjustmentProduct;
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
        Schema::create('adjustment_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quantity')->default(0);
            $table->enum('type',AdjustmentProduct::ALL_TYPES);


            $table->foreignId('product_id')
                    ->constrained('products')
                    ->onDelete('restrict');

            $table->foreignId('adjustment_id')
                    ->constrained('adjustments')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adjustment_products');
    }
};
