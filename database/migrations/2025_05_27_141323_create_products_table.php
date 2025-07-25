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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default('1')->comment('1=draft,2=indraft');
            $table->string('title');
            $table->integer('sort')->default('999');
            $table->text('description');
            $table->string('term_month')->nullable();
            $table->integer('num_trainings');
            $table->integer('price');
            // $table->string('image')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
