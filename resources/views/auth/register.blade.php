<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TechHub</title>
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
        
        /* Register Container - Matching hero section style */
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 82px);
            padding: 2rem 5%;
        }
        
        .register-form {
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
        .register-form::before {
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
        
        .register-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        
        .register-title span {
            color: var(--primary);
        }
        
        .register-subtitle {
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
        
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }
        
        .input-with-icon {
            padding-left: 2.8rem;
        }
        
        .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            transition: color 0.2s ease;
        }
        
        .toggle-password:hover {
            color: var(--dark);
        }
        
        /* Error Handling */
        .error-message {
            background-color: rgba(239, 68, 68, 0.1);
            border-left: 3px solid var(--danger);
            border-radius: 6px;
            padding: 0.75rem;
            margin-bottom: 1.5rem;
        }
        
        .error-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--danger);
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }
        
        .error-item:last-child {
            margin-bottom: 0;
        }
        
        .error-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 18px;
            height: 18px;
            background-color: var(--danger);
            color: white;
            border-radius: 50%;
            font-size: 0.75rem;
            font-weight: bold;
        }
        
        .error-text {
            color: var(--danger);
            font-size: 0.75rem;
            margin-top: 0.25rem;
            display: block;
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
            
            .register-form {
                padding: 2rem 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .register-container {
                padding: 1.5rem;
            }
            
            .register-title {
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

    <div class="register-container">
        <div class="register-form">
            <div class="form-header">
                <h1 class="register-title">Join <span>TechHub</span></h1>
                <p class="register-subtitle">Create your account to get started</p>
            </div>
            
            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                    <div class="error-item">
                        <span class="error-icon">!</span>
                        {{ $error }}
                    </div>
                    @endforeach
                </div>
                @endif
                
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" id="name" class="form-input" placeholder="full name" value="{{ old('name') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-input" placeholder="example@email.com" value="{{ old('email') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-wrapper">
                        <span class="input-icon"></span>
                        <input type="password" name="password" id="password" class="form-input input-with-icon" placeholder="••••••••" required>
                        <button type="button" class="toggle-password" aria-label="Toggle password visibility"></button>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-wrapper">
                        <span class="input-icon"></span>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-input input-with-icon" placeholder="••••••••" required>
                    </div>
                </div>
                
                <button type="submit" class="submit-btn">
                    <span>Create Account</span>
                    <span class="btn-icon">→</span>
                </button>
                
                <div class="login-link">
                    Already have an account? <a href="{{ route('login') }}">Log in</a>
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

        // Password visibility toggle
        const togglePasswordBtn = document.querySelector('.toggle-password');
        const passwordInput = document.querySelector('#password');

        if (togglePasswordBtn && passwordInput) {
            togglePasswordBtn.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
            });
        }

        // Add focus effect to inputs
        const inputs = document.querySelectorAll('.form-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                if (this.parentElement.querySelector('.input-icon')) {
                    this.parentElement.querySelector('.input-icon').style.color = 'var(--primary)';
                }
            });
            
            input.addEventListener('blur', function() {
                if (this.parentElement.querySelector('.input-icon')) {
                    this.parentElement.querySelector('.input-icon').style.color = 'var(--gray)';
                }
            });
        });
    </script>
</body>
</html>