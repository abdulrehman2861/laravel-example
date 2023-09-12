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
        Schema::table('sale_transactions', function (Blueprint $table) {
            $table->string('payment_method')->default('cash')->after('payment_status');
            $table->longText('payment_log')->nullable()->after('payment_method');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_transactions', function (Blueprint $table) {
            $table->dropColumn('payment_method');
            $table->dropColumn('payment_log');
        });
    }
};
