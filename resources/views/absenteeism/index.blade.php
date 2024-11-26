@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Absen</h1>
    
    @auth('admin')
        <a href="{{ route('absenteeism.create') }}" class="mt-4 inline-block bg-yellow-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-yellow-700 transition duration-200">
            Add New Absen
        </a>
    @endauth

    @if(session('success'))
        <div class="mt-4 text-green-600 p-3 bg-green-100 rounded-md">{{ session('success') }}</div>
    @endif

    <!-- Search Form -->
    <div class="mb-6 flex justify-end">
        <form method="GET" action="{{ route('absenteeism.index') }}" class="flex items-center space-x-4">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                class="border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Search by name, date, or reason">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition duration-200">
                Search
            </button>
        </form>
    </div>

    <!-- Table with improved design -->
    <div class="overflow-hidden border border-gray-200 rounded-lg shadow-md mt-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase">Employee Name</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase">Employee Since</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase">Position</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase">Image</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($absenteeisms as $absentee)
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $absentee->employee_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $absentee->absence_date }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $absentee->reason }}</td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <button class="toggle-status text-white rounded-lg px-4 py-2 {{ $absentee->status ? 'bg-green-600' : 'bg-red-600' }}" data-id="{{ $absentee->id }}">
                                {{ $absentee->status ? 'Active' : 'Inactive' }}
                            </button>
                            <a href="{{ route('absenteeism.edit', $absentee) }}" class="text-blue-600 hover:text-blue-800 transition duration-200">Edit</a>
                            <form action="{{ route('absenteeism.destroy', $absentee) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 ml-2 transition duration-200">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).on('click', '.toggle-status', function() {
    var button = $(this);
    var absenteeId = button.data('id');

    $.ajax({
        url: '/absenteeism/' + absenteeId + '/toggle', // Ensure this matches your route definition
        type: 'PATCH', // Use PATCH for the toggle action
        data: {
            _token: '{{ csrf_token() }}' // Include the CSRF token
        },
        success: function(response) {
            if (response.success) {
                // Toggle button appearance based on the new status
                if (response.status) {
                    button.removeClass('bg-red-600').addClass('bg-green-600').text('Active');
                } else {
                    button.removeClass('bg-green-600').addClass('bg-red-600').text('Inactive');
                }
            }
        }
    });
});
</script>
@endsection
@endsection