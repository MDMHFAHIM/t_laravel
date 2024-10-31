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
        Schema::create('hotels', function (Blueprint $table) {
        $table->id();
        $table->string('zone_id');
        $table->string('catagory_id');
        $table->string('roomtype_id');
        $table->string('image');
        $table->string('hotel_name');
        $table->string('rating');
        $table->string('is_complementary_breakfast');
        $table->string('latitude');
        $table->string('longitude');
        $table->string('hotel_details');
        $table->string('facilities');
        $table->string('checkin');
        $table->string('checkout');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
