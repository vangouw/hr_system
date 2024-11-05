<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absenteeism extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name',
        'absence_date',
        'reason',
        'status', // Ensure you have this field if you're using it
    ];
}

