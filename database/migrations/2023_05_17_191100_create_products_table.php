<?php

use App\Models\Product;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('part_name')->nullable();
            $table->string('part_number');
            $table->string('inter_number')->default("N/A");
            $table->string('shelf')->nullable();
            $table->decimal('price', $total = 8, $places = 2)->default(0.00);
            $table->decimal('cost', $total = 8, $places = 2)->nullable()->default(0.00);
            $table->bigInteger('quantity')->default(0);
            $table->bigInteger('alert_quantity')->nullable();
            $table->boolean('apply_tax')->default(0);
            $table->integer('tax')->nullable()->default(0);
            $table->enum('tax_type',Product::ALL_TAX_TYPES)->nullable();
            $table->enum('barcode_symbology',Product::ALL_BARCODE_SYMBOL_TYPES)->nullable();
            $table->string('unit')->nullable();
            $table->longText('note')->nullable();

            $table->foreignId('warehouse_id')
                    ->constrained('warehouses')
                    ->onDelete('restrict');

            $table->foreignId('supplier_id')
                    ->nullable()
                    ->constrained('suppliers')
                    ->onDelete('restrict');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
