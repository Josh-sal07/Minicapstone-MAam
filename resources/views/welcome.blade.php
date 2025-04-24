<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to TechHub</title>
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
            background-color: #FFFFFFFF;
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

        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 4rem 2rem;
            min-height: 70vh;
        }

        .header {
            font-size: 3rem;
            font-weight: bold;
            color: #3182ce; /* Blue */
            margin-bottom: 1.5rem;
        }

        .description {
            font-size: 1.25rem;
            color: #4a5568; /* Gray */
            margin-bottom: 2rem;
            max-width: 600px;
        }

        .cta-button {
            padding: 1rem 2rem;
            background-color: #ecc94b; /* Yellow */
            color: white;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            background-color: #d69e2e;
            transform: scale(1.05);
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
            }

            .navbar.active .auth-buttons {
                display: flex;
                flex-direction: column;
                width: 100%;
                padding: 1rem;
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

    <div class="hero">
        <h1 class="header">
            Welcome to <span class="highlight">TechHub</span>
        </h1>
        <p class="description">
            Got a broken device? Book a repair in minutes and get connected with certified technicians.
            We fix it all — fast, reliable, and affordable.
        </p>
        <a href="{{ route('technician.apply') }}" class="cta-button">Apply as Technician</a>
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
