@extends('layouts.technician')

@section('header', 'Technician Profile')

@section('content')
<style>
    .profile-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        font-family: 'Segoe UI', sans-serif;
    }

    .profile-container h2 {
        margin-bottom: 20px;
        font-size: 26px;
        color: #333;
        text-align: center;
    }

    .form-label {
        font-weight: 600;
        display: block;
        margin-bottom: 5px;
        color: #444;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
        transition: 0.3s border-color ease-in-out;
    }

    .form-control:focus {
        outline: none;
        border-color: #3c91e6;
        box-shadow: 0 0 5px rgba(60, 145, 230, 0.2);
    }

    .btn-submit {
        background-color: #3c91e6;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #296fc2;
    }

    .alert-success {
        padding: 12px;
        background-color: #d1e7dd;
        border: 1px solid #badbcc;
        color: #0f5132;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    small.text-danger {
        color: #e63946;
    }
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Update Profile</h4>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('technician.profile') }}" method="POST">
                        @csrf

                        {{-- Full Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ old('name', auth()->user()->name) }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email', auth()->user()->email) }}" required>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <hr>

                        {{-- New Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password
                                <small class="text-muted">(Leave blank to keep current password)</small>
                            </label>
                            <input type="password" name="password" class="form-control">
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn-submit btn-success px-4">Save Changes</button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-muted text-end small">
                    Last updated: {{ auth()->user()->updated_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
