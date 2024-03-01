<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ilanlar', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');//
            $table->unsignedInteger('tip_id');//
            $table->unsignedInteger('kimden_id');//
            $table->unsignedInteger('durum_id');//
            $table->unsignedInteger('mah_id');//
            $table->unsignedInteger('isitma_tur_id')->nullable();//
            $table->unsignedInteger('oda_sayisi_id')->nullable();//
            $table->string('baslik');
            $table->integer('fiyat');
            $table->double('alan');
            $table->string('adres');
            $table->integer('katSayisi')->nullable();
            $table->string('tel');
            $table->longText('aciklama');
            $table->integer('status')->default(0)->comment('0:Pasif 1:Aktif');
            $table->timestamps();

            $table->foreign('tip_id')->references('id')->on('tipler')->onDelete('cascade');
            $table->foreign('kimden_id')->references('id')->on('kimden')->onDelete('cascade');
            $table->foreign('durum_id')->references('id')->on('durum')->onDelete('cascade');
            $table->foreign('mah_id')->references('id')->on('mahalleler')->onDelete('cascade');
            $table->foreign('isitma_tur_id')->references('id')->on('isitma_tur')->onDelete('cascade');
            $table->foreign('oda_sayisi_id')->references('id')->on('oda_sayisi')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('ilanlar');
    }
};
