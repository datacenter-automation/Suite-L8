<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up()
    {
        Schema::create('blanket_logs', function (Blueprint $table): void {
            $table->id();
            $table->string('url');
            $table->string('host');
            $table->string('method');
            $table->integer('status');
            $table->longText('request')->nullable();
            $table->longText('response')->nullable();
            $table->timestamp('created_at');
        });
    }
};