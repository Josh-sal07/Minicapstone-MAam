<?php

// app/Http/Controllers/TechnicianApplicationController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;


class TechnicianApplicationController extends Controller
{
    public function create()
    {
        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('message', 'Please log in first.');
        // }
        return view('technician.apply');
    }

    // Add other methods like store() for handling form submissions
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'skills' => 'required|string',
            'experience' => 'required|string',
            'terms' => 'accepted',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt('password'), // or generate one
        ]);

        // Assign technician role
        $user->assignRole('technician'); // This should work if role exists in your roles table

        return redirect()->route('login')->with('success', 'Technician application submitted. Await approval.');
    }
}
