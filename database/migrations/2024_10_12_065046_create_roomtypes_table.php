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
        Schema::create('roomtypes', function (Blueprint $table) {
        $table->id();
        $table->string('hotel_id');
        $table->string('qty');
        $table->string('bedtype');
        $table->string('facilities');
        $table->string('is_ac');
        $table->string('is_tv');
        $table->string('roomfare');
        $table->string('number_of_guest');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roomtypes');
    }
};
