<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    protected $table = 'employee';
    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'date_of_birth',
        'address',
        'permanent_address',
        'phone_number',
        'gender',
        'marital_status',
        'joined_date',
        'termination_date',
        'citizenship_number',
        'profile_picture',
        'office_id'
    ];

    public function office()
    {
        return $this->belongsTo(Offices::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
}
