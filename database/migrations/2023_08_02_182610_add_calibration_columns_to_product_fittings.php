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
        Schema::table('product_fittings', function (Blueprint $table) {
            $table->boolean('calibration')->nullable()->default(null);
            $table->decimal('calibration_price', 8, 2)->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_fittings', function (Blueprint $table) {
            $table->dropColumn('calibration');
            $table->dropColumn('calibration_price');
        });
    }
};
