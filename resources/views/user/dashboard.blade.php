@extends('layouts.user')
@section('title', 'User Dashboard')
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

    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .dashboard-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0;
    }

    .dashboard-title span {
        color: var(--primary);
    }

    .status-indicator {
        display: flex;
        align-items: center;
        font-size: 0.9rem;
        color: var(--success);
    }

    .status-indicator::before {
        content: '';
        display: inline-block;
        width: 8px;
        height: 8px;
        background-color: var(--success);
        border-radius: 50%;
        margin-right: 6px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background-color: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-header {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background-color: rgba(67, 97, 238, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        color: var(--primary);
        font-size: 1.2rem;
    }

    .stat-title {
        font-size: 0.95rem;
        font-weight: 500;
        color: var(--gray);
        margin: 0;
    }

    .stat-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0;
    }

    .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .action-card {
        background-color: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .action-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .action-card h3 {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--dark);
        margin-top: 0;
        margin-bottom: 0.5rem;
    }

    .action-card p {
        color: var(--gray);
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.6rem 1.5rem;
        background-color: var(--primary);
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .action-btn:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }

    .action-btn i {
        margin-right: 0.5rem;
    }

    .messages-section {
        background-color: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .section-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--dark);
        margin: 0;
    }

    .view-all {
        color: var(--primary);
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .messages-list {
        max-height: 400px;
        overflow-y: auto;
    }

    .message-item {
        display: flex;
        padding: 1rem 0;
        border-bottom: 1px solid var(--light-gray);
    }

    .message-item:last-child {
        border-bottom: none;
    }

    .message-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgba(67, 97, 238, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-weight: 600;
        margin-right: 1rem;
        flex-shrink: 0;
    }

    .message-content {
        flex: 1;
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
    }

    .message-sender {
        font-weight: 600;
        color: var(--dark);
    }

    .message-time {
        font-size: 0.8rem;
        color: var(--gray);
    }

    .message-text {
        color: var(--gray);
        font-size: 0.95rem;
        line-height: 1.5;
    }

    .empty-state {
        text-align: center;
        padding: 2rem;
        color: var(--gray);
    }

    .empty-state p {
        margin-bottom: 0.5rem;
    }

    .empty-state .empty-icon {
        font-size: 2rem;
        margin-bottom: 1rem;
        color: var(--light-gray);
    }

    .support-section {
        background-color: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        text-align: center;
    }

    .support-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.8rem 2rem;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .support-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
    }

    .support-btn i {
        margin-right: 0.5rem;
        font-size: 1.2rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .dashboard-container {
            padding: 1.5rem;
        }

        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .status-indicator {
            margin-top: 0.5rem;
        }
    }
</style>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h1 class="dashboard-title">Welcome, <span>{{ auth()->user()->name }}</span>!</h1>
        <div class="status-indicator">Online</div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h4 class="stat-title">Active Repairs</h4>
            </div>
            <p class="stat-value">{{ $activeRepairs ?? 0 }}</p>
        </div>
        
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <a href="{{ route('user.notifications') }}">
                    <h4 class="stat-title">Notifications</h4>
                </a>
                
            </div>
            <p class="stat-value">{{ $unreadNotifications ?? 0 }}</p>
        </div>
    </div>

    <div class="action-grid">
        <div class="action-card">
            <h3>Book a Repair</h3>
            <p>Schedule a repair for your device with our certified technicians</p>
            <a href="{{ route('user.bookings') ?? '#' }}" class="action-btn">
                <i class="fas fa-calendar-plus"></i> Book Now
            </a>
        </div>
        
        <div class="action-card">
            <h3>Track Repairs</h3>
            <p>Check the status of your ongoing repair requests</p>
            <a href="{{ route('user.bookings') ?? '#' }}" class="action-btn">
                <i class="fas fa-search"></i> View Status
            </a>
        </div>
    </div>

    <div class="support-section">
        <h2 class="section-title">Need Help?</h2>
        <p>Our support team is available 24/7 to assist you</p>
        <a href="{{ route('user.help') ?? '#' }}" class="support-btn">
            <i class="fas fa-comment-dots"></i> Chat with Support
        </a>
    </div>
</div>
@endsection