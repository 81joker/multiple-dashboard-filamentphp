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
        Schema::create('booking_dates', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('bookingType_id')->nullable();
            // $table->foreign('bookingType_id')->references('id')->on('booking_types')->onDelete('cascade');
            $table->string('status')->nullable();
            $table->string('title')->nullable();
            $table->date('date')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            // $table->string('from_time')->nullable();
            // $table->string('to_time')->nullable();
            $table->string('color')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->integer('max_slots',)->nullable();
            $table->datetime('created_on')->nullable();
            $table->integer('created_from')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_dates');
    }
};
