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
        Schema::table('applicant_exam', function (Blueprint $table) {
            //
            $table->string('name')->nullable();
            $table->string('voucher_number')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('symbol_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicant_exam', function (Blueprint $table) {
            //
        });
    }
};
