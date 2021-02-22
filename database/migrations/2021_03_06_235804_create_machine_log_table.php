<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMachineLogTable extends Migration
{

    public function up()
    {
        Schema::create('machine_log', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('machine_id');
            $table->integer('user_id');
            $table->text('log_content');
        });
    }

    public function down()
    {
        Schema::drop('machine_log');
    }
}
