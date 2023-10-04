<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exam';
    protected $fillable = [
        'name',
        'form_open_date',
        'form_deu_date',
        'form_double_dustur_date',
        'status',
    ];
}
