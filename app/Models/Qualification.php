<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qualification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'qualification';
    protected $fillable = [
        'name',
        'passed_year',
        'division',
        'percentage',
        'type',
        'applicant_id',
        'university_name',
        'law_type'
    ];

    public function documents()
    {
        return $this->hasMany(ApplicantDocuments::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
