@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Absen Status</h2>

    <div class="mt-8 space-y-6">
        @if($absenteeisms->isEmpty())
            <p class="text-gray-600 text-lg text-center">No absentee records found.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($absenteeisms as $absenteeism)
                    <div class="flex items-center justify-between p-4 border rounded-lg shadow-lg bg-white">
                        <div class="flex items-center space-x-4">

                            <div>
                                <h2 class="text-lg font-semibold">{{ $absenteeism->employee_name }}</h2>
                                <p class="text-sm text-gray-600">
                                    Last Clock In: {{ $absenteeism->clock_in ?? 'N/A' }}<br>
                                    Last Clock Out: {{ $absenteeism->clock_out ?? 'N/A' }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <button 
                                class="toggle-status text-white px-4 py-2 rounded-md {{ $absenteeism->status ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500 hover:bg-red-600' }}" 
                                data-id="{{ $absenteeism->id }}">
                                {{ $absenteeism->status ? 'Clock Out' : 'Clock In' }}
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.toggle-status', function() {
        const button = $(this);
        const absenteeId = button.data('id');

        $.ajax({
            url: `/absenteeism/${absenteeId}/toggle`,
            type: 'PATCH',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    window.location.reload();
                }
            },
            error: function() {
                alert('Failed to toggle status. Please try again.');
            }
        });
    });
</script>
@endsection