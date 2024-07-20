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
        Schema::table('institution_program', function (Blueprint $table) {
            $table->foreign(['institution_id'])->references(['id'])->on('institutions');
            $table->foreign(['program_id'])->references(['id'])->on('programs');
            $table->foreign(['level_id'])->references(['id'])->on('levels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('institution_program', function (Blueprint $table) {
            $table->dropForeign('institution_program_institution_id_foreign');
            $table->dropForeign('institution_program_program_id_foreign');
            $table->dropForeign('institution_program_level_id_foreign');
        });
    }
};
