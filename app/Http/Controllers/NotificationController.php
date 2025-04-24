<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Display notifications for the authenticated user
    public function index()
    {
        // Fetch notifications for the authenticated user
        $notifications = auth()->user()->notifications;

        return view('admin.notifications.index', compact('notifications')); // Make sure you create the view (resources/views/notifications/index.blade.php)
    }
    public function uindex()
    {
        // Fetch notifications for the authenticated user
        $notifications = auth()->user()->notifications;

        return view('user.notifications.index', compact('notifications')); // Make sure you create the view (resources/views/notifications/index.blade.php)
    }
}
