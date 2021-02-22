<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMachineTypesTable extends Migration
{

    public function up()
    {
        Schema::create('machine_types', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('type_name', 30);
        });
    }

    public function down()
    {
        Schema::drop('machine_types');
    }
}
