<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'province';
    protected $fillable = [
        'name',
        'status'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function examCenter()
    {
        return $this->hasMany(ApplicantExam::class, 'province_id', 'id')->whereIn('applicant_exam.status', ['READY-FOR-ADMIT-CARD', 'GENERATED'])->where('exam_id', '3');
    }
}
