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
            $table->string('shipping_provider')->nullable()->after('sale_transaction_id');
            $table->unsignedBigInteger('pickup_location_id')->nullable()->after('shipping_provider');
            $table->string('tracking_number')->nullable()->after('pickup_location_id');
            $table->decimal('shipping_cost', 8, 2)->nullable()->after('tracking_number');
            $table->string('shipping_status')->nullable()->after('shipping_cost');
            $table->string('shipping_type')->nullable()->after('shipping_status');

            $table->foreign('pickup_location_id')->references('id')->on('pickup_locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_transaction_details', function (Blueprint $table) {
            $table->dropForeign(['pickup_location_id']);
            $table->dropColumn([
                'shipping_provider',
                'pickup_location_id',
                'tracking_number',
                'shipping_cost',
                'shipping_status',
                'shipping_type'
            ]);
        });
    }
};
