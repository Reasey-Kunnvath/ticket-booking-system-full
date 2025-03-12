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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('trans_id');
            $table->decimal('amount');
            $table->string('currency');
            $table->timestamps(); //transaction_date

            //Foreign Key
            $table->integer('order_id'); //Primary Kry form Order.order_id
            $table->integer('method_id'); //Primary Kry form PaymentMethod.method_id
            $table->integer('status_id'); //Primary Kry form TransectionStatus.status_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
