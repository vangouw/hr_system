@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-4xl font-bold text-gray-800 text-center mb-6">Welcome to the HR Absentee System</h1>
    
    <div class="mb-6 text-center">
        <a href="{{ route('absenteeism.index') }}" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600">Mark Absentee</a>
    </div>

    <div class="flex justify-center mb-4">
        @if(Auth::guard('admin')->check())
            <span class="text-sm">Welcome, {{ Auth::guard('admin')->user()->name }}</span>
            <form action="{{ route('admin.logout') }}" method="POST" class="ml-4">
                @csrf
                <button type="submit" class="text-blue-500">Logout</button>
            </form>
        @else
            <a href="{{ route('admin.login') }}" class="text-blue-500">Login</a>
            <span class="mx-2">|</span>
            <a href="{{ route('admin.register') }}" class="text-blue-500">Register</a>
        @endif
    </div>

    <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Absenteeism Status</h2>
    
    <div class="mt-8 space-y-6">
        @if($absenteeisms->isEmpty())
            <p class="text-gray-600 text-lg text-center">No absentee records found.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($absenteeisms as $absenteeism)
                    <div class="flex items-center justify-between p-4 border rounded-lg shadow-lg bg-white">
                        <div class="flex-1">
                            <h2 class="text-lg font-semibold">{{ $absenteeism->employee_name }}</h2>
                            <p class="text-sm text-gray-600">Absence Date: {{ $absenteeism->absence_date }}</p>
                        </div>
                        <div>
                            <form action="{{ route('absenteeism.toggle', $absenteeism) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-white px-4 py-2 rounded-md {{ $absenteeism->status ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500 hover:bg-red-600' }}">
                                    {{ $absenteeism->status ? 'Present' : 'Absent' }}
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
