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
        Schema::create('body_styles_glasses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('body_style_id')
                    ->constrained('body_styles')
                    ->onDelete('cascade');

            $table->foreignId('glass_id')
                    ->constrained('glasses')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('body_styles_glasses');
    }
};
