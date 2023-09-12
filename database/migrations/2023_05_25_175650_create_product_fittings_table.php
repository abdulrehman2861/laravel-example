<?php

use App\Models\ProductFitting;
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
        Schema::create('product_fittings', function (Blueprint $table) {
            $table->id();
            $table->enum('year_type',ProductFitting::ALL_YEAR_TYPES)->default(ProductFitting::YEAR_SINGLE);

            $table->foreignId('feature_id')
                    ->constrained('features')
                    ->onDelete('restrict');

            $table->foreignId('glass_id')
                    ->constrained('glasses')
                    ->onDelete('restrict');

            $table->foreignId('body_style_id')
                    ->constrained('body_styles')
                    ->onDelete('restrict');

            $table->foreignId('car_id')
                    ->constrained('cars')
                    ->onDelete('restrict'); //car aka model

            $table->foreignId('year_from_id')
                    ->constrained('years')
                    ->onDelete('restrict');

            $table->foreignId('year_to_id')
                    ->nullable()
                    ->constrained('years')
                    ->onDelete('restrict');

            $table->foreignId('category_id')
                    ->constrained('categories')
                    ->onDelete('restrict');

            $table->foreignId('product_id')
                    ->constrained('products')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_fittings');
    }
};
