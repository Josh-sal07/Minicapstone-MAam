<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to TechHub | Device Repair Services</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
            color: var(--dark);
            background-color: var(--light);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 5%;
            background-color: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        .navbar.scrolled {
            padding: 1rem 5%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: var(--primary);
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover::after {
            width: 100%;
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
            display: inline-block;
            border: 2px solid transparent;
        }
        
        .btn-outline {
            background-color: transparent;
            border-color: var(--primary);
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
            color: var(--dark);
        }
        
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5rem 5%;
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.1) 0%, rgba(79, 55, 201, 0.05) 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(76, 201, 240, 0.1) 0%, transparent 70%);
            z-index: 0;
        }
        
        .hero-content {
            flex: 1;
            max-width: 50%;
            position: relative;
            z-index: 1;
        }
        
        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        
        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transform: perspective(1000px) rotateY(-10deg);
            transition: transform 0.5s ease;
        }
        
        .hero-image:hover img {
            transform: perspective(1000px) rotateY(0deg);
        }
        
        .header {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            color: var(--dark);
            margin-bottom: 1.5rem;
        }
        
        .header span {
            color: var(--primary);
        }
        
        .description {
            font-size: 1.2rem;
            color: var(--gray);
            margin-bottom: 2.5rem;
            max-width: 90%;
        }
        
        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        
        .btn-accent {
            background-color: var(--accent);
            color: white;
        }
        
        .btn-accent:hover {
            background-color: #3ab7e0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(76, 201, 240, 0.3);
        }
        
        .stats {
            display: flex;
            gap: 2rem;
        }
        
        .stat-item {
            display: flex;
            flex-direction: column;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .features {
            padding: 6rem 5%;
            background-color: white;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1rem;
        }
        
        .section-subtitle {
            font-size: 1.1rem;
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background-color: var(--light);
            border-radius: 12px;
            padding: 2rem;
            transition: all 0.3s ease;
            border: 1px solid var(--light-gray);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border-color: rgba(67, 97, 238, 0.2);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }
        
        .feature-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .feature-description {
            color: var(--gray);
            margin-bottom: 1.5rem;
        }
        
        .how-it-works {
            padding: 6rem 5%;
            background-color: #f9fafc;
        }
        
        .steps {
            display: flex;
            justify-content: space-between;
            margin-top: 4rem;
            position: relative;
        }
        
        .step {
            flex: 1;
            text-align: center;
            padding: 0 1.5rem;
            position: relative;
            z-index: 1;
        }
        
        .step-number {
            width: 60px;
            height: 60px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 auto 1.5rem;
            position: relative;
        }
        
        .step::before {
            content: '';
            position: absolute;
            top: 30px;
            left: -50%;
            width: 100%;
            height: 2px;
            background-color: var(--light-gray);
            z-index: -1;
        }
        
        .step:first-child::before {
            display: none;
        }
        
        .step-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .step-description {
            color: var(--gray);
        }
        
        .testimonials {
            padding: 6rem 5%;
            background-color: white;
        }
        
        .testimonial-card {
            background-color: var(--light);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            position: relative;
            margin: 0 1rem;
        }
        
        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 1rem;
            left: 1.5rem;
            font-size: 5rem;
            color: rgba(67, 97, 238, 0.1);
            font-family: serif;
            line-height: 1;
        }
        
        .testimonial-content {
            font-size: 1.1rem;
            color: var(--dark);
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 1rem;
        }
        
        .author-info h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.2rem;
        }
        
        .author-info p {
            font-size: 0.9rem;
            color: var(--gray);
        }
        
        .cta-section {
            padding: 6rem 5%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            text-align: center;
            border-radius: 16px;
            margin: 0 5% 6rem;
            position: relative;
            overflow: hidden;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            z-index: 0;
        }
        
        .cta-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .cta-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
        }
        
        .cta-description {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }
        
        .btn-white {
            background-color: white;
            color: var(--primary);
        }
        
        .btn-white:hover {
            background-color: rgba(255, 255, 255, 0.9);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        footer {
            background-color: var(--dark);
            color: white;
            padding: 4rem 5% 2rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }
        
        .footer-logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1.5rem;
            display: inline-block;
        }
        
        .footer-description {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 1.5rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }
        
        .footer-links h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: white;
        }
        
        .footer-links ul {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding: 4rem 5%;
            }
            
            .hero-content {
                max-width: 100%;
                margin-bottom: 3rem;
            }
            
            .description {
                max-width: 100%;
                margin-left: auto;
                margin-right: auto;
            }
            
            .cta-buttons, .stats {
                justify-content: center;
            }
            
            .steps {
                flex-direction: column;
                gap: 3rem;
            }
            
            .step::before {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .nav-links, .auth-buttons {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .header {
                font-size: 2.5rem;
            }
            
            .description {
                font-size: 1.1rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
            
            .stats {
                flex-direction: column;
                gap: 1.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .cta-title {
                font-size: 2rem;
            }
            
            .cta-section {
                margin-bottom: 3rem;
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

    <section class="hero">
        <div class="hero-content">
            <h1 class="header">
                Repair Your Tech Devices <span>Fast & Reliable</span>
            </h1>
            <p class="description">
                Got a broken device? Book a repair in minutes and get connected with certified technicians. 
                We fix it all — from smartphones to laptops, fast, reliable, and affordable.
            </p>
            <div class="cta-buttons">
                <a href="{{ route('user.bookings') }}" class="btn btn-primary">Book a Repair</a>
                <a href="{{ route('technician.apply') }}" class="btn btn-accent">Apply as Technician</a>
            </div>
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number">5,000+</div>
                    <div class="stat-label">Devices Repaired</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Satisfaction Rate</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Support</div>
                </div>
            </div>
        </div>
        
        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Technician repairing smartphone">
        </div>
    </section>

    <section class="features">
        <div class="section-header">
            <h2 class="section-title">Why Choose TechHub?</h2>
            <p class="section-subtitle">We provide the best service with certified technicians and quality parts</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3 class="feature-title">Fast Service</h3>
                <p class="feature-description">Most repairs completed within 24 hours with our network of local technicians.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3 class="feature-title">Warranty Included</h3>
                <p class="feature-description">All repairs come with a 90-day warranty for your peace of mind.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">💎</div>
                <h3 class="feature-title">Quality Parts</h3>
                <p class="feature-description">We use only high-quality, OEM or equivalent parts for all repairs.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">💰</div>
                <h3 class="feature-title">Price Match</h3>
                <p class="feature-description">Found a better price? We'll match it and still provide superior service.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🏠</div>
                <h3 class="feature-title">At Your Doorstep</h3>
                <p class="feature-description">Many of our technicians offer on-site service for your convenience.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">📱</div>
                <h3 class="feature-title">All Devices</h3>
                <p class="feature-description">From smartphones to laptops, tablets to gaming consoles, we fix them all.</p>
            </div>
        </div>
    </section>

    <section class="how-it-works">
        <div class="section-header">
            <h2 class="section-title">How It Works</h2>
            <p class="section-subtitle">Getting your device repaired has never been easier</p>
        </div>
        
        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3 class="step-title">Book Your Repair</h3>
                <p class="step-description">Fill out our simple form with your device details and issue.</p>
            </div>
            
            <div class="step">
                <div class="step-number">2</div>
                <h3 class="step-title">Get a Quote</h3>
                <p class="step-description">Receive a transparent, upfront quote with no hidden fees.</p>
            </div>
            
            <div class="step">
                <div class="step-number">3</div>
                <h3 class="step-title">Technician Match</h3>
                <p class="step-description">We connect you with the best local technician for your repair.</p>
            </div>
            
            <div class="step">
                <div class="step-number">4</div>
                <h3 class="step-title">Repair & Return</h3>
                <p class="step-description">Get your device repaired and returned quickly with warranty.</p>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="section-header">
            <h2 class="section-title">What Our Customers Say</h2>
            <p class="section-subtitle">Trusted by thousands of satisfied customers</p>
        </div>
        
        <div class="testimonial-card">
            <p class="testimonial-content">
                "My phone screen was shattered and I needed it fixed quickly for work. TechHub connected me with a technician who came to my office the same day and had it fixed in under an hour. Amazing service!"
            </p>
            <div class="testimonial-author">
                <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Sarah J." class="author-avatar">
                <div class="author-info">
                    <h4>Sarah J.</h4>
                    <p>Marketing Director</p>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="cta-content">
            <h2 class="cta-title">Ready to Repair Your Device?</h2>
            <p class="cta-description">Join thousands of satisfied customers who trust TechHub for their device repairs.</p>
            <a href="{{ route('login') }}" class="btn btn-white">Get Started Now</a>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-about">
                <a href="#" class="footer-logo">TechHub</a>
                <p class="footer-description">
                    Connecting you with certified technicians for fast, reliable, and affordable device repairs.
                </p>
                <div class="social-links">
                    <a href="#" class="social-link">f</a>
                    <a href="#" class="social-link">t</a>
                    <a href="#" class="social-link">in</a>
                    <a href="#" class="social-link">ig</a>
                </div>
            </div>
            
            <div class="footer-links">
                <h3>Services</h3>
                <ul>
                    <li><a href="#">Smartphone Repair</a></li>
                    <li><a href="#">Laptop Repair</a></li>
                    <li><a href="#">Tablet Repair</a></li>
                    <li><a href="#">Game Console Repair</a></li>
                    <li><a href="#">Data Recovery</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h3>Company</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Technicians</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h3>Support</h3>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Warranty</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 TechHub. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navbar = document.querySelector('.navbar');
        const navLinks = document.querySelector('.nav-links');
        const authButtons = document.querySelector('.auth-buttons');

        mobileMenuBtn.addEventListener('click', () => {
            navbar.classList.toggle('active');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    navbar.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>