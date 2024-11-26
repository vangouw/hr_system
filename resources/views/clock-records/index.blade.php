@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Clock Records</h2>

    <div class="mt-8 space-y-6">
        @if($absenteeisms->isEmpty())
            <p class="text-gray-600 text-lg text-center">No clock records found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Employee Name</th>
                            <th class="py-2 px-4 border-b text-left">Clock In</th>
                            <th class="py-2 px-4 border-b text-left">Clock Out</th>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absenteeisms as $absenteeism)
                            <tr>
                                <!-- Employee Name Column -->
                                <td class="py-2 px-4 border-b">{{ $absenteeism->employee_name }}</td>
                                <!-- Clock In Column -->
                                <td class="py-2 px-4 border-b">
                                    {{ $absenteeism->clock_in ? $absenteeism->clock_in->format('Y-m-d H:i:s') : 'N/A' }}
                                </td>
                                <!-- Clock Out Column -->
                                <td class="py-2 px-4 border-b">
                                    {{ $absenteeism->clock_out ? $absenteeism->clock_out->format('Y-m-d H:i:s') : 'N/A' }}
                                </td>
                                <!-- Status Column -->
                                <td class="py-2 px-4 border-b">
                                    <span class="px-4 py-1 rounded {{ $absenteeism->status ? 'bg-green-500' : 'bg-red-500' }}">
                                        {{ $absenteeism->status ? 'Clocked In' : 'Clocked Out' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection