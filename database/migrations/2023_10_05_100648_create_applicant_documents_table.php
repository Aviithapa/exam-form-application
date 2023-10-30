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
        Schema::create('applicant_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_id');
            $table->string('document_name');
            $table->string('path');
            $table->enum('type', ['PERSONAL', 'SLC', 'HSEB/NEB', 'BACHELOR', 'MASTER', 'VOUCHER', 'LAW-BACHELOR', '7-YEAR-PLEADER'])->default('PERSONAL');
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
        Schema::dropIfExists('applicant_documents');
    }
};
