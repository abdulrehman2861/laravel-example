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
            $table->string('glass_issue')->nullable()->after('order_tax');
            $table->text('glass_issue_cause')->nullable()->after('glass_issue');
            $table->string('glass_issue_image')->nullable()->after('glass_issue_cause');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_transactions', function (Blueprint $table) {
            $table->dropColumn('glass_issue');
            $table->dropColumn('glass_issue_cause');
            $table->dropColumn('glass_issue_image');
        });
    }
};
