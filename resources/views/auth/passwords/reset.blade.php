<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - TechHub</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Custom Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7fafc; /* Light gray background */
            color: #1a202c; /* Dark gray text */
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #3182ce; /* Blue */
        }

        .logo .highlight {
            color: #48bb78; /* Green */
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #4a5568;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #3182ce;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            color: white;
        }

        .btn-blue {
            background-color: #3182ce; /* Blue */
        }

        .btn-blue:hover {
            background-color: #2b6cb0;
            transform: scale(1.05);
        }

        .btn-green {
            background-color: #48bb78; /* Green */
        }

        .btn-green:hover {
            background-color: #38a169;
            transform: scale(1.05);
        }

        /* Password reset form styles */
        .reset-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 70px); /* Adjust for navbar height */
            padding: 2rem;
        }

        .reset-form {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 100%;
            max-width: 450px;
        }

        .reset-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #3182ce;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #4a5568;
            text-align: left;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.1);
        }

        .submit-btn {
            background-color: #3182ce;
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background-color: #2b6cb0;
            transform: scale(1.02);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.875rem;
            color: #4a5568;
        }

        .login-link a {
            color: #3182ce;
            text-decoration: none;
            font-weight: 500;
        }

        /* Mobile menu */
        .mobile-menu-btn {
            display: none;
            font-size: 1.5rem;
            background: none;
            border: none;
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links, .auth-buttons {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .navbar.active .nav-links {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: #fff;
                padding: 1rem;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                z-index: 10;
            }

            .navbar.active .auth-buttons {
                display: flex;
                flex-direction: column;
                width: 100%;
                padding: 1rem;
            }

            .reset-form {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">Tech<span class="highlight">Hub</span></div>
        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="btn btn-blue">Log In</a>
            <a href="{{ route('register') }}" class="btn btn-green">Register</a>
        </div>

        <button class="mobile-menu-btn">☰</button>
    </nav>

    <div class="reset-container">
        <div class="reset-form">
            <h2 class="reset-title">Reset Your Password</h2>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" class="form-input" name="email" value="{{ old('email', $email) }}" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">New Password</label>
                    <input id="password" type="password" class="form-input" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" class="form-input" name="password_confirmation" required>
                </div>

                <button type="submit" class="submit-btn">Reset Password</button>

                <div class="login-link">
                    Remember your password? <a href="{{ route('login') }}">Log in</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navbar = document.querySelector('.navbar');

        mobileMenuBtn.addEventListener('click', () => {
            navbar.classList.toggle('active');
        });
    </script>
</body>
</html>
