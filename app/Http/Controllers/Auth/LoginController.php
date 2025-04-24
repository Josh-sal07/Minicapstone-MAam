<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            if(Auth::user()->role == 'admin'){
            return redirect()->route('admin.dashboard');// Redirect to intended route after login
            }
            elseif (Auth::user()->role == 'technician') {
                # code.dd()..
                return redirect()->route('technician.dashboard');// Redirect to intended route after login
            }
            else {
                return redirect()->route('user.dashboard');// Redirect to intended route after login
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {


        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(to: '/'); // Or wherever you want to redirect after logout
    }
}

