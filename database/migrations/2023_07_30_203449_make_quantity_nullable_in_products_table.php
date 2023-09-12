<?php

use Illuminate\Support\Facades\DB;
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
        Schema::table('products', function (Blueprint $table) {
            DB::unprepared('
                CREATE TRIGGER set_quantity_default_value BEFORE INSERT ON products
                FOR EACH ROW
                BEGIN
                    IF NEW.quantity IS NULL THEN
                        SET NEW.quantity = 0;
                    END IF;
                END
            ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            DB::unprepared('DROP TRIGGER IF EXISTS set_quantity_default_value');
        });
    }
};
