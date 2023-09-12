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
            
            // Drop the existing foreign key constraint
            $table->dropForeign(['product_id']);

            // Change the column to allow null values
            $table->unsignedBigInteger('product_id')->nullable()->change();

            // Add a new foreign key constraint with modified options
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('restrict');
            
            $table->foreignId('feature_id')
                ->nullable()
                ->default(null)
                ->constrained('features')
                ->onDelete('restrict')
                ->after('product_id');

            $table->foreignId('glass_id')
                ->nullable()
                ->default(null)
                ->constrained('glasses')
                ->onDelete('restrict')
                ->after('feature_id');

            $table->foreignId('product_fitting_id')
                ->nullable()
                ->default(null)
                ->constrained('product_fittings')
                ->onDelete('restrict')
                ->after('glass_id');

            $table->foreignId('style_id')
                ->nullable()
                ->default(null)
                ->constrained('body_styles')
                ->onDelete('restrict')
                ->after('product_fitting_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_transaction_details', function (Blueprint $table) {
            
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');

            $table->foreignId('product_id')
            ->constrained('products')
            ->onDelete('restrict');

            $table->dropForeign(['feature_id']);
            $table->dropColumn('feature_id');

            $table->dropForeign(['glass_id']);
            $table->dropColumn('glass_id');

            $table->dropForeign(['product_fitting_id']);
            $table->dropColumn('product_fitting_id');

            $table->dropForeign(['style_id']);
            $table->dropColumn('style_id');
        });
    }
};
