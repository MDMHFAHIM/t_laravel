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
        Schema::create('transport_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('transport_id');
            $table->string('person');
            $table->string('number_of_guest_adult');
            $table->string('number_of_guest_child');
            $table->string('check_in_date');
            $table->string('check_out_date');
            $table->string('fare');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transport_bookings');
    }
};
