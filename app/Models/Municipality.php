<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipality extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'municipality';
    protected $fillable = [
        'name',
        'district_id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
