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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_phone');
            $table->string('site_logo')->nullable();
            $table->string('inshop', 50)->nullable();
            $table->string('mobile', 50)->nullable();
            $table->string('default_currency_position');
            $table->string('notification_email');
            $table->text('footer_text');
            $table->text('company_address');
            $table->timestamps();

            $table->foreignId('default_currency_id')->constrained('currencies')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
