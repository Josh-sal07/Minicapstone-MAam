@extends('layouts.user')
@section('title', 'Help & Support')
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

    .help-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    .help-card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .help-header {
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        color: white;
        padding: 1.5rem;
        text-align: center;
    }

    .help-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
    }

    .help-content {
        padding: 2rem;
    }

    .help-intro {
        margin-bottom: 2rem;
        color: var(--gray);
        line-height: 1.6;
    }

    .faq-list {
        margin-bottom: 2rem;
    }

    .faq-item {
        margin-bottom: 1rem;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .faq-item:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .faq-question {
        padding: 1rem 1.5rem;
        background-color: var(--light);
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .faq-icon {
        margin-right: 1rem;
        font-size: 1.2rem;
        color: var(--primary);
    }

    .faq-question h4 {
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
        color: var(--dark);
    }

    .faq-answer {
        padding: 1rem 1.5rem 1rem 3.7rem;
        background-color: white;
        border-top: 1px solid var(--light-gray);
    }

    .faq-answer p {
        margin: 0;
        color: var(--gray);
        line-height: 1.6;
    }

    .contact-section {
        background-color: rgba(76, 201, 240, 0.1);
        border-radius: 12px;
        padding: 1.5rem;
        border-left: 4px solid var(--accent);
    }

    .contact-header {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .contact-icon {
        margin-right: 1rem;
        font-size: 1.5rem;
        color: var(--accent);
    }

    .contact-title {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--dark);
    }

    .contact-description {
        color: var(--gray);
        margin-bottom: 1.5rem;
    }

    .contact-methods {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .contact-method {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: var(--dark);
        background-color: white;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .contact-method:hover {
        background-color: var(--light);
        transform: translateX(5px);
    }

    .method-icon {
        margin-right: 0.75rem;
        font-size: 1.2rem;
        color: var(--primary);
    }

    .method-detail {
        font-weight: 500;
    }

    .chat-btn {
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
        margin-top: 1rem;
        text-decoration: none;
    }

    .chat-btn:hover {
        background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
    }

    .chat-btn i {
        margin-right: 0.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .help-container {
            padding: 0 1.5rem;
        }

        .help-content {
            padding: 1.5rem;
        }

        .faq-question {
            padding: 1rem;
        }

        .faq-answer {
            padding: 1rem 1rem 1rem 2.7rem;
        }
    }
</style>

<div class="help-container">
    <div class="help-card">
        <div class="help-header">
            <h1 class="help-title">Help & Support</h1>
        </div>

        <div class="help-content">
            <div class="help-intro">
                <p>Welcome to TechHub Support! Below you'll find answers to common questions and ways to contact our support team.</p>
            </div>

            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-user-edit faq-icon"></i>
                        <h4>How do I update my profile?</h4>
                    </div>
                    <div class="faq-answer">
                        <p>Navigate to <strong>Profile</strong> from the sidebar, update your details, and click <strong>Update Profile</strong>.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-key faq-icon"></i>
                        <h4>How do I change my password?</h4>
                    </div>
                    <div class="faq-answer">
                        <p>Click the <strong>Change Password</strong> link on the profile page and follow the instructions to reset your password.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-tools faq-icon"></i>
                        <h4>How do I book a repair?</h4>
                    </div>
                    <div class="faq-answer">
                        <p>Go to the <strong>Book Repair</strong> section, select the service type, choose a date, and submit your request.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-envelope faq-icon"></i>
                        <h4>I didn't receive a confirmation email. What should I do?</h4>
                    </div>
                    <div class="faq-answer">
                        <p>Check your spam or junk folder. If it's still missing, try resending the confirmation from your dashboard or contact support.</p>
                    </div>
                </div>
            </div>

            <div class="contact-section">
                <div class="contact-header">
                    <i class="fas fa-headset contact-icon"></i>
                    <h3 class="contact-title">Need more help?</h3>
                </div>
                <p class="contact-description">Our support team is available to assist you with any questions or issues.</p>
                
                <div class="contact-methods">
                    <a href="mailto:support@techhub.com" class="contact-method">
                        <i class="fas fa-envelope method-icon"></i>
                        <span class="method-detail">support@techhub.com</span>
                    </a>
                    
                    <div class="contact-method">
                        <i class="fas fa-phone method-icon"></i>
                        <span class="method-detail">(123) 456-7890</span>
                    </div>
                </div>

               
            </div>
        </div>
    </div>
</div>
@endsection