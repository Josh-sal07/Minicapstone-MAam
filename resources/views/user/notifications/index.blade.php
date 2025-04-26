@extends('layouts.user')
@section('title', 'My Notifications')
@section('content')
<style>
    :root {
        --primary: #4361ee;
        --primary-dark: #3a56d4;
        --secondary: #3f37c9;
        --accent: #4cc9f0;
        --light: #f8f9fa;
        --dark: #212529;
        --success: #4bb543;
        --warning: #f8961e;
        --danger: #f94144;
        --gray: #6c757d;
        --light-gray: #e9ecef;
    }

    .notifications-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    .notifications-header {
        margin-bottom: 2rem;
    }

    .notifications-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0;
    }

    .notifications-title span {
        color: var(--primary);
    }

    .notification-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .notification-item {
        background-color: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border-left: 4px solid var(--primary);
    }

    .notification-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .notification-message {
        font-size: 1.1rem;
        font-weight: 500;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .notification-meta {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 1rem;
    }

    .notification-meta-item {
        font-size: 0.9rem;
        color: var(--gray);
    }

    .notification-meta-item strong {
        color: var(--dark);
    }

    .notification-action {
        display: inline-flex;
        align-items: center;
        padding: 0.6rem 1.25rem;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .notification-action:hover {
        background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }

    .notification-action i {
        margin-right: 0.5rem;
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .empty-icon {
        font-size: 2.5rem;
        color: var(--light-gray);
        margin-bottom: 1rem;
    }

    .empty-text {
        color: var(--gray);
        margin-bottom: 0.5rem;
    }

    /* Status Badges */
    .status-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .status-pending {
        background-color: rgba(248, 150, 30, 0.1);
        color: var(--warning);
    }

    .status-in-progress {
        background-color: rgba(67, 97, 238, 0.1);
        color: var(--primary);
    }

    .status-completed {
        background-color: rgba(75, 181, 67, 0.1);
        color: var(--success);
    }

    .status-cancelled {
        background-color: rgba(249, 65, 68, 0.1);
        color: var(--danger);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .notifications-container {
            padding: 0 1.5rem;
        }

        .notification-meta {
            flex-direction: column;
            gap: 0.5rem;
        }
    }
</style>

<div class="notifications-container">
    <div class="notifications-header">
        <h1 class="notifications-title">My <span>Notifications</span></h1>
    </div>

    @forelse($notifications as $notification)
        <div class="notification-list">
            <div class="notification-item">
                <p class="notification-message">{{ $notification->data['message'] }}</p>
                <div class="notification-meta">
                    <span class="notification-meta-item">
                        <strong>Status:</strong> 
                        <span class="status-badge status-{{ str_replace(' ', '-', $notification->data['status'] ?? '') }}">
                            {{ $notification->data['status'] ?? 'N/A' }}
                        </span>
                    </span>
                    <span class="notification-meta-item">
                        <strong>Booking ID:</strong> {{ $notification->data['booking_id'] ?? 'N/A' }}
                    </span>
                    <span class="notification-meta-item">
                        <strong>Date:</strong> {{ $notification->created_at->format('M d, Y h:i A') }}
                    </span>
                </div>
                <a href="{{ url('/user/bookings') }}" class="notification-action">
                    <i class="fas fa-calendar-alt"></i> View Bookings
                </a>
            </div>
        </div>
    @empty
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-bell-slash"></i>
            </div>
            <p class="empty-text">You have no notifications yet</p>
            <p>When you have repair updates or messages, they'll appear here</p>
        </div>
    @endforelse
</div>
@endsection