<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;
use App\Notifications\TechnicianApprovedNotification;
use App\Models\User;
use App\Models\TechnicianApplication;

class AdminController extends Controller
{
    //
    public function dashboard() {

        return view('admin.dashboard');
    }

  
    public function pendingTechnicians()
{
    $applications = TechnicianApplication::where('status', 'pending')->with('user')->get();
    return view('admin.technicians.pending', compact('applications'));
}

public function approveTechnician($id)
{
    $application = TechnicianApplication::findOrFail($id);
    
    // Set status to approved
    $application->status = 'approved';
    $application->save();

    // Assign technician role to the user
    $application->user->assignRole('technician');

    // Send notification (optional)
    $application->user->notify(new TechnicianApprovedNotification($application));

    return redirect()->back()->with('success', 'Technician approved and assigned default password.');
}

public function rejectTechnician($id)
{
    $application = TechnicianApplication::findOrFail($id);
    $application->status = 'rejected';
    $application->save();

    return redirect()->back()->with('success', 'Technician rejected.');
}

public function approvedTechnicians()
{
    $technicians = Technician::onlyTrashed()->get(); // Soft deleted
    return view('admin.technicians.approved', compact('technicians'));
}
public function rejectedTechnicians()
{
    $technicians = Technician::onlyTrashed()->get(); // Soft deleted
    return view('admin.technicians.rejected', compact('technicians'));
}

}
