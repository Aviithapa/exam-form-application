<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicant';
    protected $fillable = [
        'full_name_nepali',
        'full_name_english',
        'dob_nepali',
        'dob_english',
        'citizenship_number',
        'email',
        'issued_district',
        'phone_number',
        'province_id',
        'district_id',
        'municipality_id',
        'ward_no',
        'tole',
        'contact_number',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function familyInformation()
    {
        return $this->hasOne(FamilyInformation::class);
    }
}
