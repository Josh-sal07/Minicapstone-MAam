<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{

                /**
 * @Route("/user/bookings", methods={"GET", "HEAD"})
 */
    //

    public function index()
    {
        $users = \App\Models\User::where('role', 'user')->paginate(10); // Adjust based on your role logic
        return view('admin.users.index', compact('users'));
    }

    // app/Http/Controllers/UserController.php
public function dashboard() {
    // dd('test');
    return view('user.dashboard');
}

 // Show profile page
 public function showProfile()
 {
     $user = Auth::user(); // Get the currently authenticated user

     return view('user.account.index', compact('user'));
 }


 // Show the change password form
 public function changePassword()
 {
     return view('user.account.change-password');
 }

 // Update password
 public function updatePassword(Request $request)
 {
     // Validate the input
     $request->validate([
         'current_password' => 'required',
         'new_password' => 'required|min:8|confirmed',
     ]);

     // Get the currently authenticated user
     $user = Auth::user();

     // Check if the current password is correct
     if (!Hash::check($request->current_password, $user->password)) {
         return back()->withErrors(['current_password' => 'Current password is incorrect.']);
     }

     // Update the password
     $user->password = Hash::make($request->new_password);
     $user->save();

     return redirect()->route('user.account')->with('success', 'Password updated successfully.');
 }
 public function update(Request $request)
 {
     // Validate the input - ensuring email is unique except for the current user
     $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|email|unique:users,email,' . auth()->id(),  // Ignore the email check for the current authenticated user
     ]);

     // Get the currently authenticated user
     $user = auth()->user(); // This will fetch the logged-in user

     // Optional: Check if the user has the 'user' role
     // Only let the user update their own profile, and prevent admin/technician from accessing this route
     if ($user->hasRole('admin') || $user->hasRole('technician')) {
         return redirect()->route('admin.dashboard')->with('error', 'You cannot update the profile from here.');
     }

     // Update the user data
     $user->name = $request->name;
     $user->email = $request->email;

     // Save the updated user data
     $user->save();

     // Redirect back to the account/profile page with a success message
     return redirect()->route('user.account')->with('success', 'Profile updated successfully.');
 }


        public function profile()
        {
            $user = auth()->user();
            return view('user.account.index', compact('user'));
        }
        public function edit(User $user)
        {
            return view('admin.users.edit', compact('user'));
        }


        public function destroy(User $user)
        {
            $user->delete();

            return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
        }

        public function showNotifications()
{
    $notifications = auth()->user()->notifications; // Retrieve all notifications for the user

    return view('user.notifications.index', compact('notifications'));
}


}
