<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function userDashboard()
{
    // dd('test');
    return view('user.dashboard');
}

public function userProfile()
{
    return view('user.profile');
}

public function userHelp()
{
    return view('user.help');
}

public function technicianDashboard()
{
    return view('technician.dashboard');
}

public function technicianProfile()
{
    return view('technician.profile');
}


}
