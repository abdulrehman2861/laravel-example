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
        Schema::table('purchase_transaction_details', function (Blueprint $table) {
            $table->foreignId('product_fitting_id')
                ->constrained('product_fittings')
                ->onDelete('restrict');

            $table->unsignedBigInteger('product_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_transaction_details', function (Blueprint $table) {
            $table->dropForeign(['product_fitting_id']);
            $table->dropColumn('product_fitting_id');

            $table->unsignedBigInteger('product_id')->nullable(false)->change();
        });
    }
};
