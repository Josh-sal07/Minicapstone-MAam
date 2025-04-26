<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TechnicianController extends Controller
{


    // Dashboard
    public function dashboard()
    {
        return view('technician.dashboard');
    }
    public function allBookings()
    {
        $bookings = Booking::with('user')
            ->where('technician_id', auth()->id())
            ->get();

        return view('technician.bookings.index', compact('bookings'));
    }

    public function editProfile()
    {
        return view('technician.profile.update');
    }

        public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    // All Repairs
    public function bookings()
    {
        $bookings = Booking::where('technician_id', Auth::id())
        ->where('status','!=','rejected')
        ->where('status','!=','accepted')
        ->get();
        return view('technician.bookings.index', compact('bookings'));
    }

    public function upcomingRepairs()
{
    // Assuming you are using authentication and the technician is logged in
    $technician = auth()->user();  // Get the logged-in technician

    // Fetch the bookings assigned to the technician, or scheduled for them
    $bookings = Booking::where('technician_id', $technician->id) // Assuming technician_id exists on the booking model
                        ->whereIn('status', ['accepted']) // Filter by status
                        ->get();


    // Return to the view with the bookings data
    return view('technician.bookings.upcoming', compact('bookings'));
}

    // Upcoming Repairs
    public function bookingsUpcoming()
    {
        $bookings = Booking::where('technician_id', Auth::id())
            ->whereDate('scheduled_at', '>', now())
            ->get();
        return view('technician.bookings.upcoming', compact('bookings'));
    }

    // Active Repairs
    public function bookingsActive()
    {
        $bookings = Booking::where('technician_id', Auth::id())
            ->where('status', 'active')
            ->get();
        return view('technician.bookings.active', compact('bookings'));
    }

    // Completed Repairs
    public function bookingsCompleted()
    {
        $bookings = Booking::where('technician_id', Auth::id())
            ->where('status', 'completed')
            ->get();
        return view('technician.bookings.completed', compact('bookings'));
    }

    // Notifications
    public function notifications()
    {
        $notifications = Auth::user()->notifications;
        return view('technician.notifications.index', compact('notifications'));
    }

    // Messages
    // public function messages()
    // {
    //     $messages = Message::where('id', Auth::id())->latest()->get();
    //     return view('technician.messages.index', compact('messages'));
    // }
    public function messages()
    {
        // For example, get all users except the logged-in technician
        $users = User::where('role', '!=', 'technician')->get();

        return view('technician.messages.index', compact('users'));
    }


    // Profile
    public function profile()
    {
        $technician = Auth::user();
        return view('technician.profile.update', compact('technician'));
    }
    public function apply()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please log in first.');
        }
        return view('technician.apply');
    }

    public function updateStatus(Request $request, Booking $booking)
{
    $request->validate([
        'status' => 'required|in:accepted,rejected',
    ]);

    $booking->status = $request->status;
    $booking->save();

    return redirect()->back()->with('success', 'Booking status updated.');
}

// public function acceptBooking($bookingId)
// {
//     $booking = Booking::findOrFail($bookingId);
    
//     // Check if the booking is already accepted or not
//     if ($booking->status !== 'accepted') {
//         $booking->status = 'accepted'; // Update the status to accepted
//         $booking->save();
//     }

//     return redirect()->route('technician.bookings.upcoming')->with('success', 'Booking accepted');
// }

public function acceptBooking($bookingId)
{
    $booking = Booking::findOrFail($bookingId);

    // Ensure that the technician is the one assigned
    if ($booking->technician_id !== auth()->user()->id) {
        return redirect()->route('technician.dashboard')->with('error', 'You are not assigned to this booking.');
    }

    // Update booking status to accepted
    $booking->status = 'accepted';
    $booking->save();

    // Notify the user
    $booking->user->notify(new TechnicianAcceptedBooking($booking));

    return redirect()->route('technician.bookings')->with('success', 'Booking accepted and user notified.');
}

public function completed()
{
    // Get the currently logged-in technician
    $technicianId = auth()->id();

    // Fetch completed bookings assigned to this technician
    $bookings = Booking::where('status', 'completed')
    ->where('technician_id', auth()->user()->id)
    ->paginate(10); // ✅ This returns a LengthAwarePaginator


    // Return a view with the completed bookings
    return view('technician.bookings.completed', compact('bookings'));
}


public function markAsCompleted(Booking $booking)
    {
        // Update the status to 'completed'
        $booking->status = 'completed';
        $booking->save();

        return redirect()->route('technician.bookings.completed')->with('success', 'Booking marked as completed.');
    }

    // // Method to show completed bookings
    // public function completed()
    // {
    //     $bookings = Booking::where('status', 'completed')
    //         ->where('technician_id', auth()->user()->id) // Filter by the technician
    //         ->get();

    //     return view('technician.bookings.completed', compact('bookings'));
    // }

public function update(Booking $booking)
{
    // Only allow if status is not already completed
    if ($booking->status !== 'completed') {
        $booking->status = 'completed';
        $booking->save();
    }

    return redirect()->back()->with('success', 'Repair marked as completed.');
}


// public function __construct()
//     {
//         // $this->middleware('auth');
//         // $this->middleware('role:technician');
//     }

    public function updateBookingStatus($bookingId, $status)
    {
        $booking = Booking::findOrFail($bookingId);

        // Ensure the technician is authorized to accept/reject the booking
        if ($booking->technician_id !== auth()->user()->id) {
            return redirect()->route('technician.dashboard')->with('error', 'You are not authorized to update this booking.');
        }

        // Validate the status (Only accept or reject are allowed)
        if (!in_array($status, ['accepted', 'rejected'])) {
            return redirect()->route('technician.bookings')->with('error', 'Invalid status.');
        }

        // Update the booking status
        $booking->status = $status;
        $booking->save();

        // Send notification to the user
        $booking->user->notify(new TechnicianBookingStatusNotification($booking, $status));

        // Redirect back with success message
        return redirect()->route('technician.bookings')->with('success', 'Booking ' . ucfirst($status) . ' and user notified.');
    }
}

