<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMachinesTable extends Migration
{

    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('type_id');
            $table->integer('user_id');
            $table->integer('location_id')->nullable();
            $table->string('machine_name', 30);
        });
    }

    public function down()
    {
        Schema::drop('machines');
    }
}
