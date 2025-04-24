<!-- resources/views/messages/index.blade.php -->
@extends('layouts.admin')

@section('header', 'Messages')

@section('content')
    <div class="container">
        <h1>Your Messages</h1>

        <!-- Messages List -->
        <div class="messages">
            @if($messages->isEmpty())
                <p>No messages available.</p>
            @else
                <ul>
                    @foreach($messages as $message)
                        <li class="message-item">
                            <strong>From:</strong> {{ $message->sender->name }} <br>
                            <strong>Message:</strong> {{ $message->content }} <br>
                            <strong>Sent at:</strong> {{ $message->created_at->format('Y-m-d H:i') }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Users List -->
        <div class="users">
            <h2>Users</h2>
            @if($users->isEmpty())
                <p>No users found.</p>
            @else
                <ul>
                    @foreach($users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection

@push('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            margin-top: 40px;
            color: #333;
        }

        .messages ul, .users ul {
            list-style-type: none;
            padding: 0;
        }

        .message-item {
            background-color: #f9f9f9;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
        }

        .message-item strong {
            color: #555;
        }

        .message-item p {
            font-size: 14px;
            color: #777;
        }

        .message-item + .message-item {
            margin-top: 10px;
        }

        .users ul {
            padding-left: 20px;
        }

        .users li {
            font-size: 16px;
            color: #555;
        }
    </style>
@endpush
