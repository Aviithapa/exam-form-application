<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyInformation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'family_information';
    protected $fillable = [
        'grandfather_name_nepali',
        'grandfather_name_english',
        'father_name_nepali',
        'father_name_english',
        'mother_name_nepali',
        'mother_name_english',
        'citizenship_number',
        'spouse',
        'applicant_id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
