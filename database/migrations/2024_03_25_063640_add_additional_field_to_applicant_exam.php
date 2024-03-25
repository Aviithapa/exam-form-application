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
            $table->string('subject3')->nullable();
            $table->string('total')->nullable();
            $table->string('percentage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicant_exam', function (Blueprint $table) {
            $table->dropColumn('subject3');
            $table->dropColumn('total');
            $table->dropColumn('percentage');
        });
    }
};
