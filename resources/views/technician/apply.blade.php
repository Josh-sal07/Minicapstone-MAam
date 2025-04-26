@extends('layouts.app')
@section('title', 'Technician Application')
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

    .application-container {
        max-width: 700px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    .application-card {
        background-color: white;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
    }

    /* Diagonal accent matching welcome page */
    .application-card::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 8px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        transform: translateY(-50%) rotate(-2deg);
        transform-origin: left;
    }

    .application-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 1rem;
        text-align: center;
    }

    .application-title span {
        color: var(--primary);
    }

    .application-subtitle {
        color: var(--gray);
        text-align: center;
        margin-bottom: 2rem;
        font-size: 1.1rem;
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
        padding: 0.9rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 1rem;
        background-color: #f8f9fa;
        color: var(--dark);
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        background-color: white;
    }

    textarea.form-control {
        min-height: 120px;
    }

    .form-check {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .form-check-input {
        margin-right: 0.75rem;
        width: 18px;
        height: 18px;
        accent-color: var(--primary);
    }

    .form-check-label {
        font-size: 0.95rem;
        color: var(--dark);
    }

    .form-check-label a {
        color: var(--primary);
        text-decoration: none;
    }

    .form-check-label a:hover {
        text-decoration: underline;
    }

    .submit-btn {
        width: 100%;
        padding: 1rem;
        border: none;
        border-radius: 8px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        color: white;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 0.5rem;
    }

    .submit-btn:hover {
        background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    .application-note {
        text-align: center;
        margin-top: 2rem;
        color: var(--gray);
        font-size: 0.95rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .application-card {
            padding: 2rem 1.5rem;
        }

        .application-title {
            font-size: 1.75rem;
        }
    }

    @media (max-width: 480px) {
        .application-container {
            padding: 0 1rem;
        }

        .application-title {
            font-size: 1.5rem;
        }
    }
</style>

<div class="application-container">
    <div class="application-card">
        <h1 class="application-title">Apply as a <span>Technician</span></h1>
        <p class="application-subtitle">Join our network of certified repair professionals</p>

        <form action="{{ route('technician.apply') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" name="phone" id="phone" class="form-control">
            </div>

            <div class="form-group">
                <label for="skills" class="form-label">Skills / Expertise</label>
                <textarea name="skills" id="skills" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="experience" class="form-label">Years of Experience</label>
                <select name="experience" id="experience" class="form-control">
                    <option value="">Select experience level</option>
                    <option value="0-1">Less than 1 year</option>
                    <option value="1-3">1-3 years</option>
                    <option value="3-5">3-5 years</option>
                    <option value="5-10">5-10 years</option>
                    <option value="10+">10+ years</option>
                </select>
            </div>

            <div class="form-check">
                <input type="checkbox" name="terms" id="terms" class="form-check-input" required>
                <label for="terms" class="form-check-label">
                    I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>

            <button type="submit" class="submit-btn">Submit Application</button>
        </form>

        <p class="application-note">
            Our team will review your application and get back to you within 3 business days.
        </p>
    </div>
</div>
@endsection