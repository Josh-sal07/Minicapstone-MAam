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
        $bookings = Booking::where('technician_id', Auth::id())->get();
        return view('technician.bookings.index', compact('bookings'));
    }

    public function upcomingRepairs()
{
    // Assuming you are using authentication and the technician is logged in
    $technician = auth()->user();  // Get the logged-in technician

    // Fetch the bookings assigned to the technician, or scheduled for them
    $bookings = Booking::where('technician_id', $technician->id) // Assuming technician_id exists on the booking model
                        ->whereIn('status', ['scheduled', 'in_progress']) // Filter by status
                        ->get();

    // Return to the view with the bookings data
    return view('technician.upcomingRepairs', compact('bookings'));
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
        return view('technician.profile.index', compact('technician'));
    }
    public function apply()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please log in first.');
        }
        return view('technician.apply');
    }
}

