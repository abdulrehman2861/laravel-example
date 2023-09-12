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
        // Before Insert Trigger
        DB::unprepared('
            CREATE TRIGGER set_price_default_value_insert BEFORE INSERT ON products
            FOR EACH ROW
            BEGIN
                IF NEW.price IS NULL THEN
                    SET NEW.price = 0;
                END IF;
            END
        ');

        // Before Update Trigger
        DB::unprepared('
            CREATE TRIGGER set_price_default_value_update BEFORE UPDATE ON products
            FOR EACH ROW
            BEGIN
                IF NEW.price IS NULL THEN
                    SET NEW.price = 0;
                END IF;
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS set_price_default_value_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS set_price_default_value_update');
    }
};
