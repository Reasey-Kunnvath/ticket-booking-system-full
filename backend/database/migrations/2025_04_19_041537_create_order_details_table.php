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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('order_detail_id');
            $table->foreignId('evt_id')->constrained('events', 'evt_id');
            $table->foreignId('ticket_id')->constrained('event_tickets', 'ticket_id');
            $table->integer('QTY');
            $table->float('ticket_price');
            $table->foreignId('order_id')->constrained('orders', 'order_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
