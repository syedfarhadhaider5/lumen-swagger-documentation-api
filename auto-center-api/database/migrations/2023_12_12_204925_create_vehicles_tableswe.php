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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1000)->nullable(false);
            $table->unsignedBigInteger('make')->nullable();
            $table->unsignedBigInteger('model')->nullable();
            $table->unsignedBigInteger('color')->nullable();
            $table->string('drive_type')->nullable(false);
            $table->string('transmission')->nullable(false);
            $table->string('condition')->nullable(false);
            $table->string('year', 500)->nullable(false);
            $table->string('mileage', 1000)->nullable(false);
            $table->string('fuel_type')->nullable(false);
            $table->string('engine_size', 500)->nullable(false);
            $table->string('doors', 500)->nullable(false);
            $table->string('cylinders', 500)->nullable(false);
            $table->string('VIN', 1000)->nullable(false);
            $table->text('description')->nullable();
            $table->string('price', 500)->nullable(false);
            $table->string('stock_id', 500)->nullable();
            $table->string('discount', 500)->nullable();
            $table->boolean('is_featured')->nullable();
            $table->date('featured_from_date')->nullable();
            $table->date('featured_to_date')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('dealership_id')->nullable();
            $table->boolean('is_sold')->nullable();
            $table->boolean('is_enabled')->nullable();
            $table->string('reviews', 500)->nullable();
            $table->string('rating', 500)->nullable();
            $table->foreign('dealership_id')->references('id')->on('dealerships')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('color')->references('id')->on('colors')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('make')->references('id')->on('makes')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('model')->references('id')->on('models')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles_tables');
    }
};
