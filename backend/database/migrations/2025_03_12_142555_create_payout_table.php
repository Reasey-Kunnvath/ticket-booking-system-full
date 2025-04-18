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
        Schema::create('payout', function (Blueprint $table) {
            $table->id('payout_id');
            $table->decimal('total_sales');
            $table->decimal('platform_commission');
            $table->decimal('net_payout');
            $table->string('currency');
            $table->date('payout_date');
            $table->string('ref_number');
            $table->string('notes');
            $table->timestamps();

            //Foreign Key
            // $table->integer('evt_provider_id'); //Primary Kry form Partnership_detial.partnetship_id
            // $table->integer('evt_id'); //Primary Kry form Event.evt_id
            // $table->integer('payout_status_id'); //Primary Kry form TransactionStatus.status_id
            // $table->integer('method_id'); //Primary Kry form PaymentMethod.method_id

            $table->foreignId('evt_id')->constrained("events", "evt_id");
            $table->foreignId('payout_status_id')->constrained("transactionstatus", "status_id");
            $table->foreignId('method_id')->constrained("paymentmethod", "method_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payout');
    }
};
