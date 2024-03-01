<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('resimler', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ilan_id');
            $table->string('resim'); 

            $table->foreign('ilan_id')->references('id')->on('ilanlar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resimler');
    }
};
