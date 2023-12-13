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
        Schema::create('dealerships', function (Blueprint $table) {
            $table->id();
            $table->string('business_name', 500)->nullable(false);
            $table->string('dba', 500)->nullable();
            $table->string('business_phone', 500)->nullable(false);
            $table->string('business_fax', 500)->nullable(false);
            $table->string('business_address', 1000)->nullable(false);
            $table->date('business_open_since')->nullable(false);
            $table->string('nature_of_business', 500)->nullable(false);
            $table->string('business_site', 500)->nullable(false);
            $table->string('mailing_business_address', 1000)->nullable(false);
            $table->unsignedBigInteger('dealer_type')->nullable();
            $table->string('entity_type')->nullable(false);
            $table->string('hear_about_us')->nullable();
            $table->string('referral_code', 500)->nullable();
            $table->string('representative')->nullable();
            $table->string('owner_full_name', 500)->nullable(false);
            $table->string('owner_title')->nullable(false);
            $table->string('owner_phone', 500)->nullable(false);
            $table->string('owner_email', 500)->nullable(false);
            $table->string('opening_hours', 1500)->nullable();
            $table->string('location', 500)->nullable();
            $table->string('primary_contact_name', 500)->nullable(false);
            $table->string('primary_contact_title', 500)->nullable(false);
            $table->string('primary_contact_phone', 500)->nullable(false);
            $table->string('primary_email', 500)->nullable(false);
            $table->boolean('is_master_dealer_agreement_signed')->nullable(false);
            $table->string('current_package', 500)->nullable(false);
            $table->date('license_expiry_date')->nullable(false);
            $table->string('reviews', 500)->nullable(false);
            $table->string('rating', 500)->nullable(false);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->boolean('is_enabled')->nullable(false);
            $table->foreign('created_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealerships');
    }
};
