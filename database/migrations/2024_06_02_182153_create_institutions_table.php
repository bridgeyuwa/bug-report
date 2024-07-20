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
        Schema::create('institutions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('former_name')->nullable();
            $table->string('abbr')->nullable();
            $table->text('description')->nullable();
            $table->integer('established')->nullable();
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('lga_id');
            $table->string('locality')->nullable();
            $table->unsignedBigInteger('schooltype_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('term_id');
            $table->string('address')->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->integer('rank')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
