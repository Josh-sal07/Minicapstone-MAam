<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Display user's messages
    public function index()
    {
        $messages = Message::where('receiver_id', auth()->id())->get();
        $users = User::where('id', '!=', auth()->id())->get(); // Don't show the current user
        return view('admin.messages.index', compact('messages', 'users'));
    }

    public function userMessage()
    {
        $messages = Message::where('receiver_id', auth()->id())->get();
        $users = User::where('id', '!=', auth()->id())->get(); // Don't show the current user
        return view('user.message.index', compact('messages', 'users'));
    }

    // Send a message
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:500',
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $validated['receiver_id'],
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'Message sent successfully!');
    }
}

