@extends('layouts.technician')

@section('header', 'Upcoming Repairs')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Upcoming Repairs</h1>

    @if($bookings->count())
        <div class="bg-white p-4 shadow rounded">
            <table class="table-auto w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">User</th>
                        <th class="p-2">Device</th>
                        <th class="p-2">Issue</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr class="border-t">
                            <td class="p-2">{{ $booking->user->name }}</td>
                            <td class="p-2">{{ $booking->device }}</td>
                            <td class="p-2">{{ $booking->issue }}</td>
                            <td class="p-2 capitalize">{{ $booking->status }}</td>
                            <td class="p-2">{{ $booking->updated_at->diffForHumans() }}</td>
                        </tr>
                        <td class="p-2">
                            @if ($booking->status !== 'completed')
                            <a href="{{ route('technician.bookings.completed', ['booking' => $booking->id]) }}?status=completed" class="btn btn-primary">Mark as Completed</a>

                            
                            @else
                                <span class="text-gray-500 italic">Completed</span>
                            @endif
                        </td>
                    @endforeach
                   
                    
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500">No accepted repairs available at the moment.</p>
    @endif
@endsection
