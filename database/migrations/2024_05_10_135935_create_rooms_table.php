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
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('room_id');
            $table->string('room_number')->unique();
            $table->string('room_size');
            $table->foreignId('amenity_id')->constrained('amenities', 'amenity_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('room_type_id')->constrained('room_types', 'room_type_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('location');
            $table->string('room_photo');
            $table->string('accessibility');
            $table->enum('bed_type', ['single', 'double', 'twin', 'family'])->default('double');
            $table->enum('bathroom_type', ['shower', 'bathtub'])->default('shower');
            $table->boolean('can_extra_bad')->default(1);
            $table->boolean('living_room_available')->default(0);
            $table->boolean('kitchen_available')->default(0);
            $table->boolean('corridor_available')->default(0);
            $table->boolean('can_smoke')->default(0);
            $table->boolean('is_smart_tv')->default(0);
            $table->float('admin_score')->default(0);
            $table->float('system_score')->default(0);
            $table->float('review_score')->default(0);
            $table->float('total_score')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
