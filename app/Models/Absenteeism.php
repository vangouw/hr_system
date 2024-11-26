<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Absenteeism extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name',
        'absence_date',
        'reason',
        'status',
        'clock_in',
        'clock_out',
    ];

    // Add this to ensure 'clock_in' and 'clock_out' are automatically cast to Carbon instances
    protected $casts = [
        'clock_in' => 'datetime',
        'clock_out' => 'datetime',
    ];
}