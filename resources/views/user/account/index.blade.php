@extends('layouts.user')
@section('content')
 <div class="chat-profile-container">
 <div class="chat-header">
   <h2>Update Profile</h2>
 </div>

 <div class="chat-content">
   @if(session('success'))
     <div class="success-message">{{ session('success') }}</div>
   @endif

   <form method="POST" action="{{ route('user.account') }}">
     @csrf
     <div class="form-group">
       <label for="name">Name</label>
       <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
       @error('name') <div class="error-message">{{ $message }}</div> @enderror
     </div>

     <div class="form-group">
       <label for="email">Email</label>
       <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
       @error('email') <div class="error-message">{{ $message }}</div> @enderror
     </div>

     <button type="submit" class="update-button">Update Profile</button>
   </form>

   <div class="action-links">
     <a href="{{ route('user.account') }}" class="change-password">Change Password</a>
   </div>
 </div>
 </div>
@endsection

@push('styles')
<style>
/* Container Styling */
.chat-profile-container {
  max-width: 600px;
  margin: 40px auto;
  border-radius: 16px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  overflow: hidden;
}

/* Header */
.chat-header {
  background-color: #4a76a8;
  color: white;
  padding: 15px 20px;
  text-align: center;
}

.chat-header h2 {
  margin: 0;
  font-size: 1.2rem;
  font-weight: 500;
}

/* Content Area */
.chat-content {
  background-color: #fff;
  padding: 25px;
}

/* Success Message */
.success-message {
  background-color: #e3f2fd;
  color: #0d47a1;
  padding: 12px 18px;
  border-radius: 10px;
  margin-bottom: 20px;
  border-left: 4px solid #2196f3;
  font-size: 0.95rem;
}

/* Form Groups */
.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  margin-bottom: 8px;
  font-weight: 500;
  color: #555;
  font-size: 0.95rem;
}

.form-group input {
  width: 100%;
  padding: 12px 15px;
  border: 1px solid #ddd;
  border-radius: 8px;
  background-color: #f9f9f9;
  transition: border 0.2s, box-shadow 0.2s;
}

.form-group input:focus {
  border-color: #4a76a8;
  box-shadow: 0 0 0 3px rgba(74, 118, 168, 0.1);
  outline: none;
  background-color: #fff;
}

/* Error Messages */
.error-message {
  color: #d32f2f;
  font-size: 0.85rem;
  margin-top: 6px;
  padding-left: 4px;
}

/* Update Button */
.update-button {
  background-color: #4a76a8;
  color: white;
  border: none;
  border-radius: 20px;
  padding: 12px 22px;
  font-size: 0.95rem;
  font-weight: 500;
  cursor: pointer;
  transition: background-color 0.2s;
  width: 100%;
  margin-top: 10px;
}

.update-button:hover {
  background-color: #3d6293;
}

/* Action Links */
.action-links {
  text-align: center;
  margin-top: 20px;
  padding-top: 15px;
  border-top: 1px solid #eee;
}

.change-password {
  color: #4a76a8;
  text-decoration: none;
  font-size: 0.95rem;
  font-weight: 500;
  transition: color 0.2s;
}

.change-password:hover {
  color: #3d6293;
  text-decoration: underline;
}
</style>
@endpush
