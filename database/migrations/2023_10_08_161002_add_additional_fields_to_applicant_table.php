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
        Schema::table('applicant', function (Blueprint $table) {
            //
            $table->enum('gender', ['MALE', 'FEMALE', 'OTHER'])->default('MALE');
            $table->string('religion')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('caste')->nullable();
            $table->enum('working', ['GOVERNMENT', 'NON-GOVERNMENT', 'NOT-WORKING'])->default('NOT-WORKING');
            $table->string('office_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicant', function (Blueprint $table) {
            //
        });
    }
};
