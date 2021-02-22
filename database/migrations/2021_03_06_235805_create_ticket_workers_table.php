<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketWorkersTable extends Migration
{

    public function up()
    {
        Schema::create('ticket_workers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('ticket_id');
            $table->integer('user_id');
        });
    }

    public function down()
    {
        Schema::drop('ticket_workers');
    }
}
