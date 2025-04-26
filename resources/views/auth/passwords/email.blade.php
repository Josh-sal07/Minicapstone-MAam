<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - TechHub</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7fafc;
            background-image: url('https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1800&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #1a202c;
            line-height: 1.6;
            min-height: 100vh;
        }
        
        /* Overlay to improve readability */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(247, 250, 252, 0.85);
            z-index: -1;
        }
        
        /* Navbar - Matching welcome page */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 1.5rem 5%;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .logo {
            display: flex;
            align-items: center;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }
        
        .logo span {
            color: var(--secondary);
        }
        
        .logo-icon {
            margin-right: 0.5rem;
            font-size: 2rem;
        }
        
        .auth-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }
        
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Reset Container - Matching hero section style */
        .reset-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 82px);
            padding: 2rem 5%;
        }
        
        .reset-form {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 3rem;
            width: 100%;
            max-width: 500px;
            position: relative;
            overflow: hidden;
        }
        
        /* Diagonal accent similar to welcome page */
        .reset-form::before {
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
        
        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .reset-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        
        .reset-title span {
            color: var(--primary);
        }
        
        .reset-subtitle {
            color: var(--gray);
            font-size: 1rem;
        }
        
        /* Form Elements */
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.95rem;
        }
        
        .form-input {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #f8f9fa;
            color: var(--dark);
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
            background-color: white;
        }
        
        .form-input::placeholder {
            color: var(--gray);
        }
        
        /* Status Messages */
        .status-message {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 500;
        }
        
        .status-message.success {
            background-color: rgba(75, 181, 67, 0.1);
            border-left: 4px solid var(--success);
            color: var(--success);
        }
        
        .status-message.error {
            background-color: rgba(239, 68, 68, 0.1);
            border-left: 4px solid var(--danger);
            color: var(--danger);
        }
        
        /* Submit Button - Matching welcome page buttons */
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
            margin-top: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .submit-btn:hover {
            background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
        }
        
        .submit-btn:active {
            transform: translateY(0);
        }
        
        .btn-icon {
            transition: transform 0.3s ease;
        }
        
        .submit-btn:hover .btn-icon {
            transform: translateX(5px);
        }
        
        /* Login Link */
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--gray);
            font-size: 0.875rem;
        }
        
        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        
        .login-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }
            
            .auth-buttons {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .reset-form {
                padding: 2rem 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .reset-container {
                padding: 1.5rem;
            }
            
            .reset-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="logo">
            <span class="logo-icon">🔧</span>Tech<span>Hub</span>
        </a>
        
        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="btn btn-outline">Log In</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        </div>
        
        <button class="mobile-menu-btn">☰</button>
    </nav>

    <div class="reset-container">
        <div class="reset-form">
            <div class="form-header">
                <h1 class="reset-title">Reset <span>Password</span></h1>
                <p class="reset-subtitle">Enter your email to receive a reset link</p>
            </div>
            
            @if (session('status'))
                <div class="status-message success">
                    {{ session('status') }}
                </div>
            @endif
            
            @if ($errors->any())
                <div class="status-message error">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-input" placeholder="your@email.com" value="{{ old('email') }}" required autofocus>
                </div>
                
                <button type="submit" class="submit-btn">
                    <span>Send Reset Link</span>
                    <span class="btn-icon">→</span>
                </button>
                
                <div class="login-link">
                    Remember your password? <a href="{{ route('login') }}">Log in here</a>
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

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!navbar.contains(e.target)) {
                navbar.classList.remove('active');
            }
        });
    </script>
</body>
</html>