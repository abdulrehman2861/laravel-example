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
            $table->unsignedBigInteger('category_id')->nullable()->change();
            $table->unsignedBigInteger('feature_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_fittings', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable(false)->change();
            $table->unsignedBigInteger('feature_id')->nullable(false)->change();
        });
    }
};
