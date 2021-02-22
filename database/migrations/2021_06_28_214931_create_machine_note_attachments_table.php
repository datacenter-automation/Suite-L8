<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineNoteAttachmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('machine_note_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_note_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('file_name', 70)->unique();
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
        Schema::dropIfExists('machine_note_attachments');
    }
}
