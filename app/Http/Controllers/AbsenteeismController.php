<?php

namespace App\Http\Controllers;

use App\Models\Absenteeism;
use Illuminate\Http\Request;

class AbsenteeismController extends Controller
{
    public function index()
    {
        // Retrieve all absenteeism records
        $absenteeisms = Absenteeism::all();
        
        // Return the home view with absenteeism records
        return view('home', compact('absenteeisms'));
    }

    public function toggleStatus(Absenteeism $absenteeism)
{
    $absenteeism->status = !$absenteeism->status; // Toggle the status
    $absenteeism->save();

    return redirect()->route('home')->with('success', 'Status updated successfully.');
}

}
