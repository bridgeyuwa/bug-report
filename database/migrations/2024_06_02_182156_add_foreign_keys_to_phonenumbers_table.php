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
        Schema::table('phonenumbers', function (Blueprint $table) {
            $table->foreign(['institution_id'])->references(['id'])->on('institutions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phonenumbers', function (Blueprint $table) {
            $table->dropForeign('phonenumbers_institution_id_foreign');
        });
    }
};
