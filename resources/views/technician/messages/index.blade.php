@extends('layouts.technician')
@section('header','Messages')
@section('content')
<div class="chat-container">
    <div class="chat-header">
        <h2>Select a Conversation</h2>
    </div>
    <div class="chat-users-list">
        @foreach($users as $user)
            <div class="chat-user-item">
                <div class="user-avatar">
                    <!-- You could use initials or a default avatar -->
                    <div class="avatar-placeholder">{{ substr($user->name, 0, 1) }}</div>
                </div>
                <a href="{{ route('messages.index', $user->id) }}" class="user-name">
                    <span>{{ $user->name }}</span>
                    <span class="last-seen">Active now</span>
                </a>
            </div>
        @endforeach
    </div>
</div>

<style>
    .chat-container {
        max-width: 800px;
        margin: 0 auto;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .chat-header {
        background-color: #4a76a8;
        color: white;
        padding: 15px 20px;
        text-align: center;
    }

    .chat-header h2 {
        margin: 0;
        font-size: 1.2rem;
    }

    .chat-users-list {
        background-color: white;
    }

    .chat-user-item {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        border-bottom: 1px solid #f0f0f0;
        transition: background-color 0.2s;
    }

    .chat-user-item:hover {
        background-color: #f8f9fa;
        cursor: pointer;
    }

    .user-avatar {
        margin-right: 15px;
    }

    .avatar-placeholder {
        width: 40px;
        height: 40px;
        background-color: #e3f2fd;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #4a76a8;
    }

    .user-name {
        display: flex;
        flex-direction: column;
        text-decoration: none;
        color: #333;
        flex-grow: 1;
    }

    .last-seen {
        font-size: 0.8rem;
        color: #7e8c8d;
        margin-top: 3px;
    }
</style>
@endsection
