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
            $table->enum('status', ['NEW', 'PROGRESS', 'REJECTED', 'READY-FOR-ADMIT-CARD', 'GENERATED', 'APPROVED'])->default('NEW');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicant_exam', function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });
    }
};
