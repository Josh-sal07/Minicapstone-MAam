<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Notifications\BookingStatusUpdated;
use App\Models\User;

class BookingController extends Controller
{
    // Bookings for the authenticated user (customer)


    public function index()
    {
        $bookings = auth()->user()->bookings()->with('technician')->get();
        $technicians = User::role('technician')->get(); // You can filter by location here

        return view('user.bookings.index', compact('bookings', 'technicians'));
    }


    // Store a new booking
    public function store(Request $request)
    {
        $request->validate([
            'device' => 'required|string|max:255',
            'issue' => 'required|string',
            'technician_id' => 'nullable|exists:users,id',
        ]);

        if (auth()->check()) {
            Booking::create([
                'device' => $request->device,
                'issue' => $request->issue,
                'technician_id' => $request->technician_id,
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('user.bookings')->with('success', 'Booking created successfully.');
        }

        return redirect()->route('login')->with('error', 'You must be logged in to create a booking.');
    }

    // View all bookings assigned to the authenticated technician
    public function technicianBookings()
    {
        $bookings = Booking::where('technician_id', auth()->id())
                           ->with('user') // Eager load the user relationship
                           ->get();

        return view('technician.bookings.index', compact('bookings'));
    }


    // View upcoming bookings for the technician
    public function upcomingBookings()
{
    $bookings = Booking::where('technician_id', auth()->id())
        ->upcoming()
        ->with('user')
        ->orderBy('scheduled_date')
        ->get();

    return view('technician.bookings.upcoming', compact('bookings'));
}


    // View active bookings for the technician
    public function activeBookings()
    {
        $bookings = Booking::where('technician_id', auth()->id())
            ->where('status', 'active')
            ->get();
        return view('technician.bookings.active', compact('bookings'));
    }

    // View completed bookings for the technician
    public function completedBookings()
    {
        $bookings = Booking::where('technician_id', auth()->id())
            ->where('status', 'completed')
            ->get();
        return view('technician.bookings.completed', compact('bookings'));
    }

    // Update booking status and notify the user
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,assigned,active,upcoming,completed',
        ]);

        $booking->update(['status' => $request->status]);

        // Notify user about the update
        $booking->user->notify(new BookingStatusUpdated($booking));

        return back()->with('success', 'Booking status updated.');
    }


}
