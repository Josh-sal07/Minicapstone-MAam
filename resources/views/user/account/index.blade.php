@extends('layouts.user')
@section('header', 'Account Settings')
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

    .profile-container {
        max-width: 600px;
        margin: 2rem auto;
    }

    .profile-card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .profile-header {
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        color: white;
        padding: 1.5rem;
        text-align: center;
    }

    .profile-header h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .profile-content {
        padding: 2rem;
    }

    .success-message {
        background-color: rgba(75, 181, 67, 0.1);
        color: var(--success);
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        border-left: 4px solid var(--success);
        font-size: 0.95rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: var(--dark);
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--light-gray);
        border-radius: 8px;
        font-size: 1rem;
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        background-color: white;
    }

    .error-message {
        color: var(--danger);
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }

    .update-btn {
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

    .update-btn:hover {
        background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
    }

    .update-btn i {
        margin-right: 0.5rem;
    }

    .action-links {
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--light-gray);
        text-align: center;
    }

    .action-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s ease;
        display: inline-flex;
        align-items: center;
    }

    .action-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .action-link i {
        margin-right: 0.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .profile-container {
            padding: 0 1.5rem;
        }
        
        .profile-content {
            padding: 1.5rem;
        }
    }
</style>

<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <h2>Account Settings</h2>
        </div>
        
        <div class="profile-content">
            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('user.account') }}">
                @csrf
                
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" 
                           value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" 
                           value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="update-btn">
                    <i class="fas fa-save"></i> Update Profile
                </button>
            </form>

            <div class="action-links">
                <a href="{{ route('user.account.change-password') }}" class="action-link">
                    <i class="fas fa-key"></i> Change Password
                </a>
            </div>
        </div>
    </div>
</div>
@endsection