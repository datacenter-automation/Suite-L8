<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoftwareInstalledTable extends Migration
{

    public function up()
    {
        Schema::create('software_installed', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('software_id');
            $table->integer('machine_id');
        });
    }

    public function down()
    {
        Schema::drop('software_installed');
    }
}
