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
            $table->string('user_room_booking_id');
            $table->foreignId('room_id')->constrained('rooms', 'room_id')->cascadeOnUpdate();
            $table->integer('user_id')->nullable()->default(null);
            $table->string('booking_user_name');
            $table->string('booking_user_phone');
            $table->date('from_date');
            $table->date('to_date');
            $table->integer('created_user_id');
            $table->enum('status', ['cancel', 'approved', 'user_cancel', 'pending'])->default('pending');
            $table->integer('deposit_amount');
            $table->string('deposit_type');
            $table->string('payment_type');
            $table->string('reciver_account');
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
