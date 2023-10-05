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
        Schema::create('applicant', function (Blueprint $table) {
            $table->id();
            $table->string('full_name_english');
            $table->string('full_name_nepali');
            $table->date('dob_english');
            $table->date('dob_nepali');
            $table->string('email');
            $table->string('citizenship_number');
            $table->string('issued_district');
            $table->string('phone_number');
            $table->string('contact_number')->nullable();
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('municipality_id');
            $table->integer("ward_no");
            $table->string('tole')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('province_id')->references('id')->on('province')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('district')->onDelete('cascade');
            $table->foreign('municipality_id')->references('id')->on('municipality')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant');
    }
};
