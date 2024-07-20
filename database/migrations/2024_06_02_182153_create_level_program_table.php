<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('level_program', function (Blueprint $table) {
            $table->string('program_id');
            $table->unsignedBigInteger('level_id');
            $table->text('description')->nullable();
            $table->text('direct_entry_req')->nullable();
            $table->text('utme_o_level_req')->nullable();
            $table->text('utme_subjects')->nullable();
            $table->timestamps();

            $table->primary(['program_id', 'level_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_program');
    }
};
