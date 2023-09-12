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
        Schema::create('fedex_settings', function (Blueprint $table) {
            $table->id();
            $table->string('account_number');
            $table->string('meter_number');
            $table->string('key');
            $table->string('password');
            $table->string('ship_from_addressLine');
            $table->string('ship_from_city');
            $table->string('ship_from_state');
            $table->string('ship_from_postalCode');
            $table->string('ship_from_countryCode')->default('US');
            $table->boolean('is_live')->default(false);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fedex_settings');
    }
};
