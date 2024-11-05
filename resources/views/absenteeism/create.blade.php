@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Add New Absentee</h1>
    <form action="{{ route('absentee.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
            <label for="employee_name" class="block">Employee Name</label>
            <input type="text" name="employee_name" id="employee_name" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="absence_date" class="block">Absence Date</label>
            <input type="date" name="absence_date" id="absence_date" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="reason" class="block">Reason</label>
            <input type="text" name="reason" id="reason" class="border p-2 w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Absentee</button>
    </form>
</div>
@endsection
