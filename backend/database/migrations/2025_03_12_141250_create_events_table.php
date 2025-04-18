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
        Schema::create('events', function (Blueprint $table) {
            $table->id('evt_id');
            $table->string('evt_name');
            $table->text('evt_description');
            $table->text('evt_policy');
            $table->date('evt_start_date');
            $table->date('evt_end_date');
            $table->string('evt_address');
            $table->text('evt_address_link');
            $table->enum('status', ['0', '1'])->default(1);
            $table->enum('evt_status', ['0', '1', '2'])->default(0);
            $table->timestamps();

            // Foreign keys
            // $table->integer('cate_id'); //Primary Kry form Event_Categories.cate_id
            // $table->integer('partnership_id'); //Primary Kry form Partnership_Detail.partnership_id

            $table->foreignId('cate_id')->constrained('event_categories', 'cate_id')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
