<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamp('order_date')->default(Carbon::now());
            $table->string('order_receiver_name', 250)->nullable();
            $table->text('order_receiver_address')->nullable();
            $table->decimal('order_total_before_tax', 10, 2);
            $table->decimal('order_total_after_tax', 10, 2)->nullable();
            $table->decimal('order_total_tax', 10, 2)->nullable();
            $table->string('order_tax_per', 250);
            $table->decimal('order_amount_paid', 10, 2);
            $table->decimal('order_total_amount_due', 10, 2);
            $table->string('pay_with')->nullable();
            $table->string('notes')->nullable();
            $table->text('note')->nullable();
            $table->datetime('paid_on')->nullable();
            $table->integer('paid')->default('0');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->datetime('created_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
