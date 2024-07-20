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
        Schema::create('catchment_institution', function (Blueprint $table) {
            $table->unsignedBigInteger('catchment_id');
            $table->string('institution_id');
            $table->timestamps();

            $table->primary(['catchment_id', 'institution_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catchment_institution');
    }
};
