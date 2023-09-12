<?php

use App\Models\PurchaseTransaction;
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
        Schema::table('purchase_transactions', function (Blueprint $table) {
            $table->enum('payment_status', PurchaseTransaction::ALL_PAYMENT_STATUS)->default(PurchaseTransaction::PAYMENT_STATUS_UNPAID);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_transactions', function (Blueprint $table) {
            $table->dropColumn('payment_status');
        });
    }
};
