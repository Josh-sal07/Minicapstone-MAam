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

    public function approveTechnician($id)
    {
        $application = TechnicianApplication::findOrFail($id);
        $application->status = 'approved';
        $application->save();

        // Assign technician role
        $application->user->assignRole('technician');

        return redirect()->back()->with('success', 'Technician approved.');
    }

    public function rejectTechnician($id)
    {
        $application = TechnicianApplication::findOrFail($id);
        $application->status = 'rejected';
        $application->save();

        return redirect()->back()->with('success', 'Technician rejected.');
    }
    public function pendingTechnicians()
{
    $applications = TechnicianApplication::where('status', 'pending')->with('user')->get();
    return view('admin.technicians.pending', compact('applications'));
}

    public function approvedTechnicians()
{
    $technicians = Technician::where('approved', true)->get();
    return view('admin.technicians.approved', compact('technicians'));
}

public function rejectedTechnicians()
{
    $technicians = Technician::onlyTrashed()->get(); // Soft deleted
    return view('admin.technicians.rejected', compact('technicians'));
}

}
