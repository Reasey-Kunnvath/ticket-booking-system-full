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
        Schema::create('event_tickets', function (Blueprint $table) {
            $table->id('ticket_id');
            $table->string('ticket_title');
            $table->decimal('ticket_price');
            $table->integer('ticket_in_stock');
            $table->string('ticket_description')->nullable();
            $table->date('ticket_expiry_date');
            $table->enum('ticket_status', ['0', '1', '2'])->default(2);
            $table->timestamps();

            //foreign Key
            // $table->integer('evt_id'); //Primary Kry form Event.evt_id

            $table->foreignId('evt_id')->constrained('events', 'evt_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_tickets');
    }
};
