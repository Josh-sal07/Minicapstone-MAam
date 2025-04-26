@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<style>
    .admin-dashboard {
        font-family: 'Segoe UI', sans-serif;
        padding: 20px;
    }

    .admin-dashboard h1 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 10px;
        color: #333;
    }

    .admin-dashboard p {
        font-size: 16px;
        color: #666;
        margin-bottom: 30px;
    }

    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }

    .card {
        padding: 20px;
        background: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 10px;
        text-align: center;
        transition: 0.3s;
    }

    .card:hover {
        background-color: #f1f1f1;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .card h3 {
        margin-top: 10px;
        font-size: 18px;
        color: #333;
    }

    .card-icon {
        font-size: 28px;
        color: #3c91e6;
        
    }
</style>

<div class="admin-dashboard">
    <h1>Hello Admin</h1>
    <p>Manage technicians, view reports, and handle system settings from here.</p>
    
    <div class="dashboard-cards">

        <div class="card">
            <div class="card-icon">👨‍🔧</div>
            <h3>Manage Technicians</h3>
            <p>Approve, reject, or edit technician profiles.</p>
        </div>

        <div class="card">
            <div class="card-icon">👤</div>
            <a href="{{ route('admin.users') }}">
            <h3>Manage Users</h3>
            <p>View and manage registered customers.</p>
        </a>
        </div>
        

    

        <div class="card">
            <div class="card-icon">📊</div>
            <h3>Reports</h3>
            <p>Generate reports on repairs, revenue, and technician activity.</p>
        </div>

        <div class="card">
            <div class="card-icon">⚙️</div>
            <h3>System Settings</h3>
            <p>Configure app settings, notifications, and preferences.</p>
        </div>

        <div class="card">
            <div class="card-icon">📬</div>
            <h3>Messages & Inquiries</h3>
            <p>Read and respond to technician or customer messages.</p>
        </div>

    </div>
</div>
@endsection
