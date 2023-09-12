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
        Schema::table('customers', function (Blueprint $table) {
            $table->string('phone')->nullable()->change();
            $table->string('state')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->text('billing_address')->nullable()->change();
            $table->text('service_address')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('phone')->nullable(false)->change();
            $table->string('state')->nullable(false)->change();
            $table->string('city')->nullable(false)->change();
            $table->string('country')->nullable(false)->change();
            $table->text('billing_address')->nullable(false)->change();
            $table->text('service_address')->nullable(false)->change();
        });
    }
};
