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
        Schema::create('cars_body_styles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('car_id')
                    ->constrained('cars')
                    ->onDelete('cascade');

            $table->foreignId('body_style_id')
                    ->constrained('body_styles')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars_body_styles');
    }
};
