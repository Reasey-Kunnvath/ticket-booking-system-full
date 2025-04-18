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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->integer('QTY');
            $table->decimal('total_amount');
            $table->timestamps(); //it's can use for orderDate

            //Foreign Key
            // $table->integer('user_id'); //Primary Kry form Users.user_id
            // $table->integer('ticket_id'); //Primary Kry form Event_Ticket.ticket_id
            // $table->integer('status_id'); //Primary Kry form OrderStatus.status_id
            // $table->integer('coupon_id'); //Primary Kry form Coupons.conpons_id

            $table->foreignId('user_id')->constrained("users");
            $table->foreignId('ticket_id')->constrained("event_tickets", 'ticket_id');
            $table->foreignId('status_id')->constrained("orderstatus", 'status_id');
            $table->foreignId('coupon_id')->constrained("coupons", "coupons_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
