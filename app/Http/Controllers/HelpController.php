<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    // Display help or FAQ page
    public function index()
    {
        // You can return a view that displays help content
        return view('user.help.index'); // Make sure you create the view (resources/views/help/index.blade.php)
    }
}

