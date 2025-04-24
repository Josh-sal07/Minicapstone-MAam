{{-- Extend a base layout --}}
@extends('layouts.technician')

@section('header', 'Notifications')

@section('content')
    <div class="container">
        <h1>Notifications</h1>

        {{-- Display the notifications --}}
        @if($notifications->isEmpty())
            <p>No notifications available.</p>
        @else
            <ul>
                @foreach($notifications as $notification)
                    <li>
                        <strong>{{ $notification->title }}</strong>
                        <p>{{ $notification->message }}</p>
                        <small>Sent on: {{ $notification->created_at->format('d M Y, H:i') }}</small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
