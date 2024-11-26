<?php

namespace App\Http\Controllers;

use App\Models\Absenteeism;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AbsenteeismController extends Controller
{
    public function index(Request $request)
{
    $query = Absenteeism::query();

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;

        $query->where('employee_name', 'like', '%' . $search . '%')
              ->orWhere('absence_date', 'like', '%' . $search . '%')
              ->orWhere('reason', 'like', '%' . $search . '%');
    }

    $absenteeisms = $query->get();

    return view('absenteeism.index', compact('absenteeisms'));
}

    public function toggleStatus(Absenteeism $absenteeism)
{
    if ($absenteeism->status) {
        // Clock Out: Set clock_out timestamp to now
        $absenteeism->clock_out = Carbon::now();
    } else {
        // Clock In: Set clock_in timestamp to now
        $absenteeism->clock_in = Carbon::now();
    }

    // Toggle status: clocked in (true) or clocked out (false)
    $absenteeism->status = !$absenteeism->status;

    // Save changes to the database
    $absenteeism->save();

    // Return a success response
    return response()->json(['success' => true]);
}


    public function create()
    {
        // Show the form for creating a new absenteeism record
        return view('absenteeism.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'employee_name' => 'required|string|max:255',
        'absence_date' => 'required|date',
        'reason' => 'required|string|max:255',
    ]);

    Absenteeism::create([
        'employee_name' => $request->employee_name,
        'absence_date' => $request->absence_date,
        'reason' => $request->reason,
    ]);

    return redirect()->route('absenteeism.index')->with('success', 'Absentee record created successfully.');
}

    public function edit(Absenteeism $absenteeism)
    {
        // Show the form for editing the specified absenteeism record
        return view('absenteeism.edit', compact('absenteeism'));
    }

    public function update(Request $request, Absenteeism $absenteeism)
{
    $request->validate([
        'employee_name' => 'required|string|max:255',
        'absence_date' => 'required|date',
        'reason' => 'required|string|max:255',
    ]);

    $absenteeism->update([
        'employee_name' => $request->employee_name,
        'absence_date' => $request->absence_date,
        'reason' => $request->reason,
    ]);

    return redirect()->route('absenteeism.index')->with('success', 'Absentee record updated successfully.');
}




    public function destroy(Absenteeism $absenteeism)
    {
        // Delete the specified absenteeism record
        $absenteeism->delete();

        return redirect()->route('absenteeism.index')->with('success', 'Absenteeism record deleted successfully.');
    }
}
