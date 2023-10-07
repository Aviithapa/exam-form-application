<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $table = 'municipality';
    protected $fillable = [
        'name',
        'district_id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
