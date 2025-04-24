@extends('layouts.user')

@section('title', 'My Bookings')

@section('content')
    <h1 class="text-2xl font-bold mb-4">My Repair Bookings</h1>

    <!-- Booking Form -->
    <form action="{{ route('user.bookings') }}" method="POST" class="bg-white p-6 rounded shadow-md mb-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium">Device</label>
                <input type="text" name="device" required class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-medium">Issue Description</label>
                <textarea name="issue" rows="3" required class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <div>
                <label class="block font-medium">Payment Method</label>
                <select name="payment_method" required class="w-full border rounded px-3 py-2">
                    <option value="cash">Cash on Repair</option>
                    <option value="downpayment">Downpayment</option>
                </select>
            </div>

            <div>
                <label class="block font-medium">Select Technician</label>
                <select name="technician_id" required class="w-full border rounded px-3 py-2">
                    <option value="">Choose Technician</option>
                    @foreach($technicians as $technician)
                        <option value="{{ $technician->id }}">
                            {{ $technician->name }} — {{ $technician->location ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="mt-4 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            Book Repair
        </button>
    </form>

    <!-- Booking History -->
    <div class="bg-white p-6 rounded shadow-md">
        <h2 class="text-xl font-semibold mb-4">Your Bookings</h2>

        @if($bookings->count())
            <table class="w-full table-auto border">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="p-2">Device</th>
                        <th class="p-2">Issue</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Technician</th>
                        <th class="p-2">Payment</th>
                        <th class="p-2">Booked At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr class="border-t">
                            <td class="p-2">{{ $booking->device }}</td>
                            <td class="p-2">{{ $booking->issue }}</td>
                            <td class="p-2 capitalize">{{ $booking->status }}</td>
                            <td class="p-2">
                                {{ $booking->technician ? $booking->technician->name : 'Pending' }}
                            </td>
                            <td class="p-2 capitalize">{{ $booking->payment_method ?? 'Not Set' }}</td>
                            <td class="p-2">{{ $booking->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500">You have no bookings yet.</p>
        @endif
    </div>
@endsection
