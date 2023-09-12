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
        Schema::table('zip_codes', function (Blueprint $table) {
            $table->string('state')->after('zip_code')->nullable();
            $table->string('country')->after('state')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('zip_codes', function (Blueprint $table) {
            $table->dropColumn('state');
            $table->dropColumn('country');
        });
    }
};
