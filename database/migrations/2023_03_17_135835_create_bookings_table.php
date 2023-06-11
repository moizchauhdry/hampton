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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 100)->nullable();
            $table->string('user_email', 100)->nullable();
            $table->string('user_phone', 100)->nullable();

            $table->string('pickup', 100)->nullable();
            $table->string('destination', 100)->nullable();

            $table->tinyInteger('passengers_no')->nullable();
            $table->tinyInteger('lugages_no')->nullable();
            $table->tinyInteger('vehicles_no')->nullable();
            $table->string('flight_no', 100)->nullable();

            $table->float('price')->default(0);
            $table->float('tip')->default(0);
            $table->float('toll')->default(0);
            $table->float('process_fee')->default(0);
            $table->float('discount')->default(0);
            $table->float('total_price')->default(0);

            $table->dateTime('booking_date')->nullable();
            $table->string('vehicle_name', 100)->nullable();
            $table->string('booking_plan', 100)->nullable();
            $table->string('payment_type', 100)->nullable();

            $table->text('additional_msg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
