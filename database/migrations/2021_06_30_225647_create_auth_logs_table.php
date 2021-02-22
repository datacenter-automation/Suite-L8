<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthLogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('auth_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->index();
            $table->foreignId('blame_on_user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->references('id')->on('users');
            $table->string('ip_address', 255)->nullable();
            $table->string('session_id', 255)->nullable()->index();
            $table->text('user_agent')->nullable();
            $table->boolean('killed_from_console')->default(false);
            $table->timestamp('logged_out_at')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('auth_logs');
    }
}
