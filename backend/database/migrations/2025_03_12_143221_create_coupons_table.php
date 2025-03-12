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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id('coupons_id');
            $table->string('coupons_title');
            $table->string('coupons_type');
            $table->bigInteger('coupons_value');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['0', '1'])->default(1);
            $table->integer('max_use');
            $table->timestamps();

            //Foreign key
            $table->integer('createdby'); //Primary Kry form Users.user_id
            $table->integer('evt_id'); //Primary Kry form Events.evt_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
