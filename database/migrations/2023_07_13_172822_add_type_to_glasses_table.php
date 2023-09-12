<?php

use App\Models\Glass;
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
        Schema::table('glasses', function (Blueprint $table) {
            $table->string('type')->nullable()->default(Glass::TYPE_OTHER);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('glasses', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
