<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Display the reports page
    public function index()
    {
        return view('admin.reports.index');  // You can create this view to render the reports page.
    }
}
