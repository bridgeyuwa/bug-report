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
        Schema::table('catchments', function (Blueprint $table) {
            $table->foreign(['region_id'])->references(['id'])->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catchments', function (Blueprint $table) {
            $table->dropForeign('catchments_region_id_foreign');
        });
    }
};
