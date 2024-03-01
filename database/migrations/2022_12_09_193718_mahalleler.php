<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mahalleler', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ilce_id');
            $table->string('mahalle', 75);
            
            $table->foreign('ilce_id')->references('id')->on('ilceler')->onDelete('cascade');
        });
    }

    public function down()
    {
        //
    }
};
