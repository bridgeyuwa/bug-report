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
        Schema::table('socials', function (Blueprint $table) {
            $table->foreign(['institution_id'])->references(['id'])->on('institutions');
            $table->foreign(['socialtype_id'])->references(['id'])->on('socialtypes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('socials', function (Blueprint $table) {
            $table->dropForeign('socials_institution_id_foreign');
            $table->dropForeign('socials_socialtype_id_foreign');
        });
    }
};
