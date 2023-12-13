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
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->string('title', 500)->nullable(false);
            $table->string('year', 500)->nullable(false);
            $table->unsignedBigInteger('make_id')->nullable();
            $table->timestamps();

            $table->foreign('make_id')->references('id')->on('makes')->onDelete('SET NULL')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model');
    }
};
