<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMachineNotesTable extends Migration
{

    public function up()
    {
        Schema::create('machine_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('machine_id');
            $table->text('note_content');
        });
    }

    public function down()
    {
        Schema::drop('machine_notes');
    }
}
