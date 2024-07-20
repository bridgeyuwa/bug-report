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
        Schema::table('catchment_institution', function (Blueprint $table) {
            $table->foreign(['catchment_id'])->references(['id'])->on('catchments');
            $table->foreign(['institution_id'])->references(['id'])->on('institutions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catchment_institution', function (Blueprint $table) {
            $table->dropForeign('catchment_institution_catchment_id_foreign');
            $table->dropForeign('catchment_institution_institution_id_foreign');
        });
    }
};
