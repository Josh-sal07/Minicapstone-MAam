@extends('layouts.user')
@section('header', 'Change Password')
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

    .password-container {
        max-width: 500px;
        margin: 2rem auto;
    }

    .password-card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        padding: 2rem;
    }

    .password-header {
        margin-bottom: 1.5rem;
    }

    .password-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark);
        margin: 0;
    }

    .status-message {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }

    .status-success {
        background-color: rgba(75, 181, 67, 0.1);
        border-left: 4px solid var(--success);
        color: var(--success);
    }

    .status-error {
        background-color: rgba(239, 68, 68, 0.1);
        border-left: 4px solid var(--danger);
        color: var(--danger);
    }

    .error-list {
        margin: 0;
        padding-left: 1.5rem;
    }

    .error-item {
        margin-bottom: 0.25rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: var(--dark);
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--light-gray);
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    .submit-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 0.8rem;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
    }

    .submit-btn i {
        margin-right: 0.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .password-container {
            padding: 0 1.5rem;
        }
        
        .password-card {
            padding: 1.5rem;
        }
    }
</style>

<div class="password-container">
    <div class="password-card">
        <div class="password-header">
            <h1 class="password-title">Change Password</h1>
        </div>

        @if (session('status'))
            <div class="status-message status-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="status-message status-error">
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li class="error-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.account.change-password.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" name="new_password" id="new_password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-key"></i> Update Password
            </button>
        </form>
    </div>
</div>
@endsection