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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_person')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('phone_alternative')->nullable();
            $table->string('fax')->nullable();
            $table->string('discount_Type')->default('fixed');
            $table->decimal('discount', $total = 8, $places = 2)->default(0.00)->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('country');
            $table->text('billing_address');
            $table->text('service_address');
            $table->longText('note')->nullable();

            $table->foreignId('customer_Type_id')
                    ->constrained('customer_types')
                    ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
