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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('car_id');
            $table->string('car_name');
            $table->string('car_price');
            $table->string('pick_up_date');
            $table->string('drop_off_date');
            $table->string('pick_up_time');
            $table->string('chauffeur');
            $table->string('payment_status');
            $table->string('delivery_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
