<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketAttachmentsTable extends Migration
{

    public function up()
    {
        Schema::create('ticket_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('ticket_id');
            $table->string('file_name', 70);
        });
    }

    public function down()
    {
        Schema::drop('ticket_attachments');
    }
}
