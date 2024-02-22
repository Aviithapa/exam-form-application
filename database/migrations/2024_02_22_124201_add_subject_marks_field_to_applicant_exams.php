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
            $table->string('subject1')->nullable();
            $table->string('subject2')->nullable();
            $table->enum('result', ['Fail', 'Passed', 'Absent', 'NOT-PUBLISHED'])->default('NOT-PUBLISHED');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicant_exam', function (Blueprint $table) {
            //
            $table->dropColumn('subject1');
            $table->dropColumn('subject2');
            $table->dropColumn('result');
        });
    }
};
