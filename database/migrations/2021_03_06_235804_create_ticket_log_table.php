<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketLogTable extends Migration
{

    public function up()
    {
        Schema::create('ticket_log', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('ticket_id');
            $table->integer('user_id');
            $table->text('log_content');
        });
    }

    public function down()
    {
        Schema::drop('ticket_log');
    }
}
