<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterSportsTable extends Migration
{
    public function up()
    {
        Schema::create('master_sports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('bookable');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('master_sports');
    }
}
