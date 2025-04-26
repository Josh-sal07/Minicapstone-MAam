@extends('layouts.technician')

@section('header', 'Completed Repairs')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Completed Repairs</h1>

    @if($bookings->count())
        <div class="bg-white p-4 shadow rounded">
            <table class="table-auto w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">User</th>
                        <th class="p-2">Device</th>
                        <th class="p-2">Issue</th>
                        <th class="p-2">Completed On</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr class="border-t">
                            <td class="p-2">{{ $booking->user->name }}</td>
                            <td class="p-2">{{ $booking->device }}</td>
                            <td class="p-2">{{ $booking->issue }}</td>
                            <td class="p-2">{{ $booking->updated_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500">No completed repairs at the moment.</p>
    @endif
@endsection
