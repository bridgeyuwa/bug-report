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
        Schema::table('lgas', function (Blueprint $table) {
            $table->foreign(['state_id'])->references(['id'])->on('states');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lgas', function (Blueprint $table) {
            $table->dropForeign('lgas_state_id_foreign');
        });
    }
};
