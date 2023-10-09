<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantExam extends Model
{
    use HasFactory;

    protected $table = 'applicant_exam';
    protected $fillable = [
        'applicant_id',
        'exam_id',
        'status',
        'name',
        'voucher_number',
        'contact_number',
        'symbol_number',
    ];

    public function applicant()
    {
        return $this->belongsToMany(Applicant::class);
    }
}
