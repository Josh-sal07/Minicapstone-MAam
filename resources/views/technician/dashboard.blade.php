@extends('layouts.technician')
@section('title', 'Technician Dashboard')
@section('content')
<div class="technician-dashboard-container">
    <div class="dashboard-header">
        <div class="welcome-section">
            <h1>Welcome Technician, {{ auth()->user()->name }}!</h1>
            <p class="status">
                <span class="status-indicator"></span>
                Available for Assignments
            </p>
        </div>
        <div class="quick-stats">
            <div class="stat-card">
                <span class="stat-value">{{ $pendingRepairs ?? 0 }}</span>
                <span class="stat-label">Pending Repairs</span>
            </div>
            <div class="stat-card">
                <span class="stat-value">{{ $completedToday ?? 0 }}</span>
                <span class="stat-label">Completed Today</span>
            </div>
        </div>
    </div>

    <div class="dashboard-content">
        <div class="current-assignments">
            <div class="section-header">
                <h2>Current Assignments</h2>
                <a href="{{ route('technician.bookings') ?? '#' }}" class="view-all">View All</a>
            </div>

            @if(isset($assignedRepairs) && count($assignedRepairs) > 0)
                <div class="assignments-grid">
                    @foreach($assignedRepairs as $repair)
                    <div class="repair-card">
                        <div class="repair-header">
                            <span class="repair-id">REP-{{ $repair->id ?? '1234' }}</span>
                            <span class="repair-priority {{ $repair->priority ?? 'medium' }}">
                                {{ ucfirst($repair->priority ?? 'Medium') }}
                            </span>
                        </div>
                        <div class="repair-details">
                            <p class="device-type">{{ $repair->device_type ?? 'Smartphone' }}</p>
                            <p class="repair-issue">{{ $repair->issue ?? 'Screen Replacement' }}</p>
                        </div>
                        <div class="repair-customer">
                            <div class="customer-initial">{{ substr($repair->customer_name ?? 'John Doe', 0, 1) }}</div>
                            <div class="customer-info">
                                <p class="customer-name">{{ $repair->customer_name ?? 'John Doe' }}</p>
                                <p class="scheduled-time">{{ $repair->scheduled_time ?? 'Today, 2:30 PM' }}</p>
                            </div>
                        </div>
                        <div class="repair-actions">
                            <a href="{{ route('technician.repair.detail', $repair->id ?? 1) ?? '#' }}" class="action-button view">View Details</a>
                            <a href="{{ route('technician.messages', $repair->customer_id ?? 1) ?? '#' }}" class="action-button message">Message</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="no-assignments">
                    <div class="empty-icon">🔧</div>
                    <p>No current assignments</p>
                    <span>Check back soon for new repair requests</span>
                </div>
            @endif
        </div>

        <div class="dashboard-secondary">
            <div class="messages-panel">
                <div class="section-header">
                    <h2>Recent Messages</h2>
                    <a href="{{ route('technician.messages') ?? '#' }}" class="view-all">View All</a>
                </div>

                @if(isset($recentMessages) && count($recentMessages) > 0)
                    <div class="messages-list">
                        @foreach($recentMessages as $message)
                        <div class="message-item">
                            <div class="message-avatar">{{ substr($message->sender_name ?? 'John Doe', 0, 1) }}</div>
                            <div class="message-content">
                                <div class="message-header">
                                    <span class="message-sender">{{ $message->sender_name ?? 'John Doe' }}</span>
                                    <span class="message-time">{{ $message->created_at->diffForHumans() ?? '10 min ago' }}</span>
                                </div>
                                <p class="message-text">{{ $message->content ?? "Hi, I'm wondering about the status of my repair?" }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-messages">
                        <p>No new messages</p>
                    </div>
                @endif
            </div>

            {{-- <div class="schedule-panel">
                <div class="section-header">
                    <h2>Today's Schedule</h2>
                    <a href="{{ route('technician.schedule') ?? '#' }}" class="view-all">Full Calendar</a>
                </div> --}}

                @if(isset($todaySchedule) && count($todaySchedule) > 0)
                    <div class="schedule-timeline">
                        @foreach($todaySchedule as $appointment)
                        <div class="timeline-item">
                            <div class="timeline-time">{{ $appointment->time ?? '2:30 PM' }}</div>
                            <div class="timeline-content">
                                <p class="timeline-title">{{ $appointment->title ?? 'iPhone Screen Repair' }}</p>
                                <p class="timeline-details">{{ $appointment->customer_name ?? 'John Doe' }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-schedule">
                        <p>No appointments scheduled for today</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .technician-dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eaeaea;
    }

    .welcome-section h1 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        margin: 0 0 5px 0;
    }

    .status {
        display: flex;
        align-items: center;
        font-size: 0.9rem;
        color: #666;
    }

    .status-indicator {
        width: 8px;
        height: 8px;
        background-color: #4CAF50;
        border-radius: 50%;
        margin-right: 8px;
    }

    .quick-stats {
        display: flex;
        gap: 15px;
    }

    .stat-card {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 12px 20px;
        text-align: center;
        min-width: 120px;
    }

    .stat-value {
        display: block;
        font-size: 1.5rem;
        font-weight: bold;
        color: #4a76a8;
    }

    .stat-label {
        font-size: 0.8rem;
        color: #666;
    }

    .dashboard-content {
        display: grid;
        grid-template-columns: 3fr 2fr;
        gap: 25px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .section-header h2 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin: 0;
    }

    .view-all {
        font-size: 0.85rem;
        color: #4a76a8;
        text-decoration: none;
    }

    .view-all:hover {
        text-decoration: underline;
    }

    .assignments-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 15px;
    }

    .repair-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        padding: 15px;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .repair-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .repair-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .repair-id {
        font-size: 0.8rem;
        color: #777;
    }

    .repair-priority {
        font-size: 0.8rem;
        padding: 3px 8px;
        border-radius: 12px;
        font-weight: 500;
    }

    .repair-priority.high {
        background-color: #ffebee;
        color: #d32f2f;
    }

    .repair-priority.medium {
        background-color: #fff8e1;
        color: #ff8f00;
    }

    .repair-priority.low {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .repair-details {
        margin-bottom: 12px;
    }

    .device-type {
        font-weight: 600;
        margin: 0 0 2px 0;
        color: #333;
    }

    .repair-issue {
        margin: 0;
        color: #666;
        font-size: 0.9rem;
    }

    .repair-customer {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f0f0f0;
    }

    .customer-initial {
        width: 35px;
        height: 35px;
        background-color: #e3f2fd;
        color: #4a76a8;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 10px;
    }

    .customer-info p {
        margin: 0;
    }

    .customer-name {
        font-size: 0.9rem;
        font-weight: 500;
    }

    .scheduled-time {
        font-size: 0.8rem;
        color: #777;
    }

    .repair-actions {
        display: flex;
        gap: 8px;
    }

    .action-button {
        flex: 1;
        text-align: center;
        padding: 8px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        transition: background-color 0.2s;
    }

    .action-button.view {
        background-color: #f5f5f5;
        color: #333;
    }

    .action-button.view:hover {
        background-color: #e0e0e0;
    }

    .action-button.message {
        background-color: #4a76a8;
        color: white;
    }

    .action-button.message:hover {
        background-color: #3d6293;
    }

    .no-assignments {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        color: #777;
    }

    .empty-icon {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .dashboard-secondary {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .messages-panel, .schedule-panel {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .messages-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .message-item {
        display: flex;
        padding-bottom: 12px;
        border-bottom: 1px solid #f0f0f0;
    }

    .message-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .message-avatar {
        width: 35px;
        height: 35px;
        background-color: #e3f2fd;
        color: #4a76a8;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 10px;
    }

    .message-content {
        flex: 1;
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 4px;
    }

    .message-sender {
        font-size: 0.9rem;
        font-weight: 500;
        color: #333;
    }

    .message-time {
        font-size: 0.75rem;
        color: #999;
    }

    .message-text {
        margin: 0;
        font-size: 0.85rem;
        color: #666;
    }

    .no-messages, .no-schedule {
        text-align: center;
        padding: 15px 0;
        color: #777;
        font-size: 0.9rem;
    }

    .schedule-timeline {
        display: flex;
        flex-direction: column;
    }

    .timeline-item {
        display: flex;
        padding: 10px 0;
    }

    .timeline-time {
        width: 70px;
        font-weight: 500;
        color: #4a76a8;
        font-size: 0.85rem;
    }

    .timeline-content {
        flex: 1;
        padding-left: 15px;
        border-left: 2px solid #e3f2fd;
        position: relative;
    }

    .timeline-content:before {
        content: '';
        position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #4a76a8;
        left: -6px;
        top: 5px;
    }

    .timeline-title {
        margin: 0 0 2px 0;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .timeline-details {
        margin: 0;
        font-size: 0.8rem;
        color: #777;
    }

    @media (max-width: 992px) {
        .dashboard-content {
            grid-template-columns: 1fr;
        }

        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .quick-stats {
            margin-top: 15px;
            width: 100%;
        }

        .stat-card {
            flex: 1;
        }
    }

    @media (max-width: 576px) {
        .assignments-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection
