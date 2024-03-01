<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ilceler', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('il_id');
            $table->string('ilce', 75);
            
            $table->foreign('il_id')->references('id')->on('iller')->onDelete('cascade');
            });
    }

    public function down()
    {
        Schema::dropIfExists('ilceler');
    }
};
