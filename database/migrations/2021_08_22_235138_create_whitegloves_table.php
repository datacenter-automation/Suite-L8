<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhiteglovesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whitegloves', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('username', 30);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('salt', 30);
            $table->string('password');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->string('register_ip', 15);
            $table->string('forget_token', 100)->nullable();
            $table->string('active_token', 100)->nullable();
            $table->timestamp('blocked_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whitegloves');
    }
}
