<?php

namespace App\Http\Controllers;

use App\Models\Absenteeism;

class ClockRecordController extends Controller
{
    public function index()
    {
        $absenteeisms = Absenteeism::all();

        return view('clock-records.index', compact('absenteeisms'));
    }
}
