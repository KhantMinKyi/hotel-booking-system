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
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->bigIncrements('room_booking_id');
            $table->foreignId('room_id')->constrained('rooms', 'room_id')->cascadeOnUpdate();
            $table->integer('user_id')->nullable()->default(null);
            $table->string('booking_user_name');
            $table->string('booking_user_phone');
            $table->date('from_date');
            $table->date('to_date');
            $table->integer('created_user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_bookings');
    }
};
