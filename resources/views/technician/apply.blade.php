@extends('layouts.app')
@section('title', 'Technician Application')
@section('content')
<style>
    .form-container {
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
}

.form-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
    color: #333;
}

.form-box {
    background-color: #fff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
}

.form-group {
    margin-bottom: 16px;
}

.form-group label {
    display: block;
    font-weight: 500;
    color: #444;
    margin-bottom: 6px;
}

.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
}

.form-checkbox {
    display: flex;
    align-items: center;
    margin-bottom: 16px;
}

.form-checkbox input {
    margin-right: 8px;
}

.form-checkbox label {
    font-size: 14px;
    color: #555;
}

.form-button {
    width: 100%;
    background-color: #2563eb;
    color: white;
    padding: 10px;
    font-weight: 500;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-button:hover {
    background-color: #1d4ed8;
}

.form-note {
    text-align: center;
    font-size: 14px;
    color: #666;
    margin-top: 20px;
}

</style>
<div class="form-container">
    <h1 class="form-title">Apply as a Technician</h1>

    <form action="{{ route('technician.apply') }}" method="POST" class="form-box">
        @csrf

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" name="phone" id="phone">
        </div>

        <div class="form-group">
            <label for="skills">Skills / Expertise</label>
            <textarea name="skills" id="skills" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="experience">Years of Experience</label>
            <select name="experience" id="experience">
                <option value="">Select experience level</option>
                <option value="0-1">Less than 1 year</option>
                <option value="1-3">1-3 years</option>
                <option value="3-5">3-5 years</option>
                <option value="5-10">5-10 years</option>
                <option value="10+">10+ years</option>
            </select>
        </div>

        <div class="form-checkbox">
            <input type="checkbox" name="terms" id="terms" required>
            <label for="terms">I agree to the terms and conditions</label>
        </div>

        <button type="submit" class="form-button">Submit Application</button>
    </form>

    <p class="form-note">
        Our team will review your application and get back to you within 3 business days.
    </p>
</div>
@endsection
