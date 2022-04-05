<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id');
            $table->timestamp('date_from')->nullable();
            $table->timestamp('date_to')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('available_times');
    }
};
