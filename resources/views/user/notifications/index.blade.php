@extends('layouts.user')
@section('content')
<div class="chat-container">
    <div class="chat-header">
        <h2>📬 Your Notifications</h2>
    </div>

    <div class="notifications-list">
        @if ($notifications->count())
            @foreach ($notifications as $notification)
                <div class="notification-item {{ is_null($notification->read_at) ? 'unread' : 'read' }}">
                    <div class="notification-content">
                        @if ($notification->type === 'App\Notifications\NewMessageNotification')
                            <div class="notification-message">
                                <div class="notification-title">
                                    <strong>{{ $notification->data['sender_name'] }}</strong>
                                </div>
                                <div class="message-preview">{{ $notification->data['message'] }}</div>
                            </div>
                            <div class="notification-action">
                                <a href="{{ route('messages.chat', $notification->data['sender_id']) }}" class="view-chat-btn">View Chat</a>
                            </div>
                        @else
                            <div class="notification-message">
                                <div class="notification-title"><em>Unknown notification type</em></div>
                            </div>
                        @endif
                    </div>
                    <div class="notification-time">{{ $notification->created_at->diffForHumans() }}</div>
                </div>
            @endforeach

            <div class="pagination-container">
                {{ $notifications->links() }}
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">🔔</div>
                <p>No notifications yet</p>
                <small>When you receive messages, they'll appear here</small>
            </div>
        @endif
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
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .notifications-list {
        background-color: white;
    }

    .notification-item {
        padding: 15px 20px;
        border-bottom: 1px solid #f0f0f0;
        transition: all 0.2s ease;
    }

    .notification-item.unread {
        background-color: #f5f9ff;
        border-left: 3px solid #4a76a8;
    }

    .notification-item:hover {
        background-color: #f8f9fa;
    }

    .notification-content {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .notification-message {
        flex-grow: 1;
    }

    .notification-title {
        margin-bottom: 5px;
        color: #333;
    }

    .message-preview {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 8px;
    }

    .notification-time {
        font-size: 0.8rem;
        color: #7e8c8d;
        margin-top: 5px;
    }

    .notification-action {
        margin-left: 15px;
    }

    .view-chat-btn {
        display: inline-block;
        padding: 6px 12px;
        background-color: #4a76a8;
        color: white;
        border-radius: 20px;
        text-decoration: none;
        font-size: 0.8rem;
        transition: background-color 0.2s;
    }

    .view-chat-btn:hover {
        background-color: #3d6293;
    }

    .pagination-container {
        padding: 15px;
        display: flex;
        justify-content: center;
    }

    .empty-state {
        padding: 40px 20px;
        text-align: center;
        color: #7e8c8d;
    }

    .empty-icon {
        font-size: 2rem;
        margin-bottom: 10px;
    }
</style>
@endsection
