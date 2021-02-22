<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration
{

    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('user_id');
            $table->integer('status_id');
            $table->text('ticket_content');
            $table->tinyInteger('ticket_read');
        });
    }

    public function down()
    {
        Schema::drop('tickets');
    }
}
