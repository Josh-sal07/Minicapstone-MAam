<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class TechnicianBookingController extends Controller
{
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Booking status updated successfully!');
    }


    public function complete(Booking $booking)
{
    // Optional: check if the logged-in technician is the one assigned to this booking
    if ($booking->technician_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    $booking->status = 'completed';
    $booking->save();

    return redirect()->back()->with('success', 'Booking marked as completed.');
}
}
