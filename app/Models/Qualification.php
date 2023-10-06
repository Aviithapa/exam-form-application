<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $table = 'qualification';
    protected $fillable = [
        'name',
        'passed_year',
        'division',
        'percentage',
        'type',
        'applicant_id'
    ];

    public function documents()
    {
        return $this->hasMany(ApplicantDocuments::class);
    }
}
