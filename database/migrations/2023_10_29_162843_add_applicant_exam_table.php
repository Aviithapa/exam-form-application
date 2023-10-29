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
            $table->string('bank_name')->nullable();
            $table->string('total_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicant_exam', function (Blueprint $table) {
            //
            $table->dropColumn('bank_name');
            $table->dropColumn('total_amount');
        });
    }
};
