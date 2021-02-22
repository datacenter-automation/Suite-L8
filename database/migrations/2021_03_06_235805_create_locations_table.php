<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationsTable extends Migration
{

    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('group_id')->nullable();
            $table->string('location_name', 255);
            $table->string('location_description', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::drop('locations');
    }
}
