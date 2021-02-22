<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoftwareCategoryTable extends Migration
{

    public function up()
    {
        Schema::create('software_category', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('category_name', 80);
        });
    }

    public function down()
    {
        Schema::drop('software_category');
    }
}
