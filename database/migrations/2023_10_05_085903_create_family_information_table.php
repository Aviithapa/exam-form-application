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
        Schema::create('family_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_id');

            $table->string('grandfather_name_english');
            $table->string('grandfather_name_nepali');

            $table->string('father_name_english');
            $table->string('father_name_nepali');

            $table->string('mother_name_english');
            $table->string('mother_name_nepali');

            $table->string('spouse')->nullable(); // You can expand this as needed
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('applicant_id')->references('id')->on('applicant')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_information');
    }
};
