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
        Schema::create('partnership_details', function (Blueprint $table) {
            $table->id('partnership_id');
            $table->string('org_name');
            $table->string('org_type');
            $table->text('org_address');
            $table->string('org_email');
            $table->string('org_phone_number');
            $table->string('ambassador_name');
            $table->string('ambassador_email');
            $table->string('ambassador_phone');
            $table->enum('status', ['0', '1'])->default(1);
            $table->enum('req_status', ['0', '1', '2'])->default(0);
            $table->timestamps();


            //Foreign Key
            // $table->integer('user_id'); //Primary Kry form Users.user_id

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partnership_details');
    }
};
