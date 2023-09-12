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
        Schema::table('sale_transaction_details', function (Blueprint $table) {
            $table->json('shipping_log')->nullable()->after('shipping_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_transaction_details', function (Blueprint $table) {
            $table->dropColumn('shipping_log');
        });
    }
};
