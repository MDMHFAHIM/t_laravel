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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('airline_id');
            $table->string('image');
            $table->string('class');
            $table->string('flightprice_id');
            $table->string('zone_id');
            $table->string('departure_time');
            $table->string('transit_time');
            $table->string('is_complementary_food');
            $table->string('baggage_allowance');
            $table->string('fare');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
