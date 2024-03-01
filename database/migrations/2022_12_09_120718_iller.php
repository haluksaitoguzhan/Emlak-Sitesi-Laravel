<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('iller', function (Blueprint $table) {
            $table->increments('id');
            $table->string('il', 50);
        });
        
    }

    public function down()
    {
        //
    }
};
