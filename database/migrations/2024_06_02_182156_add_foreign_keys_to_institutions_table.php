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
        Schema::table('institutions', function (Blueprint $table) {
            $table->foreign(['category_id'])->references(['id'])->on('categories');
            $table->foreign(['lga_id'])->references(['id'])->on('lgas');
            $table->foreign(['schooltype_id'])->references(['id'])->on('schooltypes');
            $table->foreign(['state_id'])->references(['id'])->on('states');
            $table->foreign(['term_id'])->references(['id'])->on('terms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('institutions', function (Blueprint $table) {
            $table->dropForeign('institutions_category_id_foreign');
            $table->dropForeign('institutions_lga_id_foreign');
            $table->dropForeign('institutions_schooltype_id_foreign');
            $table->dropForeign('institutions_state_id_foreign');
            $table->dropForeign('institutions_term_id_foreign');
        });
    }
};
