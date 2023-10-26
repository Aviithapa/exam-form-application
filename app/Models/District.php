<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'district';
    protected $fillable = [
        'name',
        'province_id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
}
