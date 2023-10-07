<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantLogs extends Model
{
    use HasFactory;
    protected $table = 'applicant_logs_tables';
    protected $fillable = [
        'created_by',
        'status',
        'state',
        'remarks',
        'applicant_id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
