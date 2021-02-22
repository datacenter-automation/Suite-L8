<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('ticket_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('ticket_id');
            $table->integer('user_id');
            $table->text('comment_content');
        });
    }

    public function down()
    {
        Schema::drop('ticket_comments');
    }
}
