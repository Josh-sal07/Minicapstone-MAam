@extends('layouts.technician')

@section('header', 'All Assigned Repairs')

@section('content')

<h1 class="text-2xl font-bold mb-4">All Assigned Repairs</h1>

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
                    <th class="p-2">Actions</th>
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
                        <td class="p-2">
                            <div class="flex space-x-2">
                                <!-- Accept form -->
                                <form method="POST" action="{{ route('technician.bookings.updateStatus', $booking->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="accepted">
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-sm px-3 py-1 rounded">Accept</button>
                                </form>

                                <!-- Reject form -->
                                <form method="POST" action="{{ route('technician.bookings.updateStatus', $booking->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded">Reject</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p class="text-gray-500">No bookings assigned yet.</p>
@endif

@endsection
