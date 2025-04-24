@extends('layouts.user')
@section('title', 'User Dashboard')
@section('content')
<div class="chat-dashboard-container">
    <div class="chat-header">
        <h1>Welcome, {{ auth()->user()->name }}!</h1>
        <p class="status-indicator">Online</p>
    </div>

    <div class="dashboard-summary">
        <div class="info-card">
            <div class="info-icon">📋</div>
            <div class="info-content">
                <h3>Active Repairs</h3>
                <p class="count">{{ $activeRepairs ?? 0 }}</p>
            </div>
        </div>
        <div class="info-card">
            <div class="info-icon">🔔</div>
            <div class="info-content">
                <h3>Notifications</h3>
                <p class="count">{{ $unreadNotifications ?? 0 }}</p>
            </div>
        </div>
    </div>

    <div class="action-cards">
        <div class="action-card">
            <h3>Book a Repair</h3>
            <p>Schedule a repair for your device with our certified technicians</p>
            <a href="{{ route('user.bookings') ?? '#' }}" class="action-button">Book Now</a>
        </div>
        <div class="action-card">
            <h3>Track Repairs</h3>
            <p>Check the status of your ongoing repair requests</p>
            <a href="{{ route('user.bookings') ?? '#' }}" class="action-button">View Status</a>
        </div>
    </div>

    <div class="recent-messages">
        <h2>Recent Messages</h2>
        @if(isset($recentMessages) && count($recentMessages) > 0)
            <div class="messages-list">
                @foreach($recentMessages as $message)
                <div class="message-preview">
                    <div class="message-avatar">
                        <div class="avatar-placeholder">{{ substr($message->sender_name ?? 'T', 0, 1) }}</div>
                    </div>
                    <div class="message-content">
                        <div class="message-header">
                            <span class="sender-name">{{ $message->sender_name ?? 'Technician' }}</span>
                            <span class="message-time">{{ $message->created_at->diffForHumans() ?? 'Recently' }}</span>
                        </div>
                        <p class="message-text">{{ $message->content ?? 'Your repair is in progress.' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-messages">
                <p>No recent messages</p>
                <span>When technicians update you about your repairs, messages will appear here</span>
            </div>
        @endif
    </div>

    <div class="quick-support">
        <h2>Need Help?</h2>
        <a href="{{ route('user.help') ?? '#' }}" class="support-button">
            <span class="support-icon">💬</span>
            <span>Chat with Support</span>
        </a>
    </div>
</div>

<style>
    .chat-dashboard-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
    }

    .chat-header {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .chat-header h1 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        margin: 0;
    }

    .status-indicator {
        color: #4CAF50;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
    }

    .status-indicator:before {
        content: '';
        display: inline-block;
        width: 8px;
        height: 8px;
        background-color: #4CAF50;
        border-radius: 50%;
        margin-right: 6px;
    }

    .dashboard-summary {
        display: flex;
        margin-bottom: 25px;
        gap: 20px;
    }

    .info-card {
        flex: 1;
        display: flex;
        align-items: center;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .info-icon {
        font-size: 1.8rem;
        margin-right: 15px;
    }

    .info-content h3 {
        margin: 0;
        font-size: 0.9rem;
        color: #666;
    }

    .info-content .count {
        font-size: 1.5rem;
        font-weight: bold;
        color: #4a76a8;
        margin: 5px 0 0 0;
    }

    .action-cards {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }

    .action-card {
        flex: 1;
        background-color: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        transition: transform 0.2s;
    }

    .action-card:hover {
        transform: translateY(-3px);
    }

    .action-card h3 {
        margin: 0 0 10px 0;
        font-size: 1.1rem;
        font-weight: bold;
        color: #333;
    }

    .action-card p {
        color: #666;
        margin-bottom: 20px;
        font-size: 0.95rem;
    }

    .action-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4a76a8;
        color: white;
        text-decoration: none;
        border-radius: 20px;
        font-size: 0.9rem;
        transition: background-color 0.2s;
    }

    .action-button:hover {
        background-color: #3d6293;
    }

    .recent-messages {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    }

    .recent-messages h2 {
        font-size: 1.1rem;
        margin: 0 0 15px 0;
        color: #333;
    }

    .messages-list {
        max-height: 300px;
        overflow-y: auto;
    }

    .message-preview {
        display: flex;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .message-avatar {
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

    .message-content {
        flex: 1;
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    .sender-name {
        font-weight: 500;
        color: #333;
    }

    .message-time {
        font-size: 0.8rem;
        color: #999;
    }

    .message-text {
        color: #666;
        margin: 0;
        font-size: 0.95rem;
        line-height: 1.4;
    }

    .empty-messages {
        padding: 30px 0;
        text-align: center;
        color: #999;
    }

    .empty-messages p {
        font-size: 1.1rem;
        margin: 0 0 5px 0;
    }

    .empty-messages span {
        font-size: 0.9rem;
    }

    .quick-support {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
    }

    .quick-support h2 {
        font-size: 1.1rem;
        margin: 0 0 15px 0;
        color: #333;
    }

    .support-button {
        display: inline-flex;
        align-items: center;
        padding: 12px 25px;
        background-color: #4a76a8;
        color: white;
        text-decoration: none;
        border-radius: 25px;
        font-size: 0.95rem;
        transition: background-color 0.2s, transform 0.2s;
    }

    .support-button:hover {
        background-color: #3d6293;
        transform: scale(1.05);
    }

    .support-icon {
        font-size: 1.2rem;
        margin-right: 8px;
    }

    @media (max-width: 768px) {
        .dashboard-summary,
        .action-cards {
            flex-direction: column;
        }

        .info-card,
        .action-card {
            margin-bottom: 15px;
        }
    }
</style>
@endsection
