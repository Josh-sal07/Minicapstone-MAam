@extends('layouts.technician')
@section('header','Active Repairs')

@foreach($bookings as $booking)
    <div class="card mb-3 p-3">
        <p><strong>User:</strong> {{ $booking->user->name }}</p>
        <p><strong>Issue:</strong> {{ $booking->issue }}</p>
        <p><strong>Status:</strong> {{ $booking->status }}</p>

        <!-- Toggle chat box -->
        <button class="btn btn-sm btn-primary" onclick="toggleChat({{ $booking->user->id }})">
            Message User
        </button>

        <div id="chat-{{ $booking->user->id }}" class="chat-box mt-3" style="display:none; border: 1px solid #ccc; padding: 10px;">
            <div class="messages" style="max-height: 200px; overflow-y: scroll;">
                @php
                    $messages = \App\Models\Message::where(function ($q) use ($booking) {
                        $q->where('sender_id', auth()->id())
                          ->where('receiver_id', $booking->user->id);
                    })->orWhere(function ($q) use ($booking) {
                        $q->where('sender_id', $booking->user->id)
                          ->where('receiver_id', auth()->id());
                    })->orderBy('created_at')->get();
                @endphp

                @foreach($messages as $msg)
                    <div style="text-align: {{ $msg->sender_id === auth()->id() ? 'right' : 'left' }}">
                        <p><strong>{{ $msg->sender->name }}:</strong> {{ $msg->message }}</p>
                        <small>{{ $msg->created_at->diffForHumans() }}</small>
                    </div>
                    <hr>
                @endforeach
            </div>

            <!-- Message form -->
            <form method="POST" action="{{ route('messages.send') }}">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $booking->user->id }}">
                <textarea name="message" rows="2" class="form-control mt-2" required></textarea>
                <button type="submit" class="btn btn-success btn-sm mt-1">Send</button>
            </form>
        </div>
    </div>
@endforeach
