<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantDocuments extends Model
{
    use HasFactory;
    protected $table = 'applicant_documents';
    protected $fillable = [
        'document_name',
        'path',
        'type',
        'applicant_id'
    ];
}
