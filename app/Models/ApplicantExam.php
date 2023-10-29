<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantExam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'applicant_exam';
    protected $fillable = [
        'applicant_id',
        'exam_id',
        'status',
        'name',
        'voucher_number',
        'contact_number',
        'symbol_number',
        'province_id',
    ];

    public function applicant()
    {
        return $this->belongsToMany(Applicant::class);
    }

    public function exam()
    {
        return $this->belongsToMany(Exam::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
