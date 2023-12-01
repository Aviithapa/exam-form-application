<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'exam';
    protected $fillable = [
        'name',
        'form_open_date',
        'form_deu_date',
        'form_double_dustur_date',
        'status',
        'published',
        'signature'
    ];

    public function applicant()
    {
        return $this->belongsToMany(Applicant::class);
    }

    public function applicant_exam()
    {
        return $this->belongsToMany(ApplicantExam::class);
    }
}
