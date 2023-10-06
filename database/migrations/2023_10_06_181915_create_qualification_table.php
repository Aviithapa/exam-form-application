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
        Schema::create('qualification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_id');
            $table->string('name');
            $table->string('passed_year');
            $table->string('division');
            $table->string('percentage');
            $table->enum('type', ['SLC', 'HSEB/NEB', 'BACHELOR', 'MASTER', 'OTHER'])->default('OTHER');
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
        Schema::dropIfExists('qualification');
    }
};
