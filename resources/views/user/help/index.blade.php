@extends('layouts.user')
@section('content')
<div class="chat-help-container">
    <div class="chat-header">
        <h2>Help & Support</h2>
    </div>

    <div class="chat-content">
        <div class="help-intro">
            <p>Welcome to the Help Center! Below are some frequently asked questions and helpful information to guide you:</p>
        </div>

        <div class="faq-list">
            <div class="faq-item">
                <div class="faq-question">
                    <span class="faq-icon">🧾</span>
                    <h4>How do I update my profile?</h4>
                </div>
                <div class="faq-answer">
                    <p>Navigate to <strong>Profile</strong> from the sidebar, update your details, and click <strong>Update Profile</strong>.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span class="faq-icon">🔒</span>
                    <h4>How do I change my password?</h4>
                </div>
                <div class="faq-answer">
                    <p>Click the <strong>Change Password</strong> link on the profile page and follow the instructions to reset your password.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span class="faq-icon">🛠️</span>
                    <h4>How do I book a repair?</h4>
                </div>
                <div class="faq-answer">
                    <p>Go to the <strong>Book Repair</strong> section, select the service type, choose a date, and submit your request.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span class="faq-icon">📩</span>
                    <h4>I didn't receive a confirmation email. What should I do?</h4>
                </div>
                <div class="faq-answer">
                    <p>Check your spam or junk folder. If it's still missing, try resending the confirmation from your dashboard or contact support.</p>
                </div>
            </div>
        </div>

        <div class="contact-support">
            <div class="contact-header">
                <span class="contact-icon">📞</span>
                <h4>Need more help?</h4>
            </div>
            <p>Feel free to reach out to our support team:</p>
            <div class="contact-methods">
                <a href="mailto:support@techhub.com" class="contact-method">
                    <span class="method-icon">✉️</span>
                    <span class="method-detail">support@techhub.com</span>
                </a>
                <div class="contact-method">
                    <span class="method-icon">📱</span>
                    <span class="method-detail">(123) 456-7890</span>
                </div>
                <a href="#" class="chat-now-button">
                    <span>Chat with us now</span>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .chat-help-container {
        max-width: 800px;
        margin: 40px auto;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

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

    .chat-content {
        background-color: #fff;
        padding: 25px;
    }

    .help-intro {
        margin-bottom: 20px;
        color: #555;
        line-height: 1.6;
    }

    .faq-list {
        margin-bottom: 30px;
    }

    .faq-item {
        border-radius: 12px;
        background-color: #f8f9fa;
        margin-bottom: 15px;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .faq-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
    }

    .faq-question {
        padding: 15px 20px;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #eee;
    }

    .faq-icon {
        font-size: 1.5rem;
        margin-right: 15px;
    }

    .faq-question h4 {
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
        color: #333;
    }

    .faq-answer {
        padding: 15px 20px 15px 55px;
    }

    .faq-answer p {
        margin: 0;
        color: #666;
        line-height: 1.6;
    }

    .contact-support {
        background-color: #e3f2fd;
        border-radius: 12px;
        padding: 20px;
    }

    .contact-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .contact-icon {
        font-size: 1.5rem;
        margin-right: 15px;
    }

    .contact-header h4 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
    }

    .contact-support p {
        margin: 0 0 15px 0;
        color: #555;
    }

    .contact-methods {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .contact-method {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #333;
        background-color: #fff;
        padding: 12px 15px;
        border-radius: 10px;
        transition: background-color 0.2s;
    }

    .contact-method:hover {
        background-color: #f0f7ff;
    }

    .method-icon {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .method-detail {
        font-weight: 500;
    }

    .chat-now-button {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #4a76a8;
        color: white;
        text-decoration: none;
        padding: 12px;
        border-radius: 10px;
        margin-top: 10px;
        font-weight: 500;
        transition: background-color 0.2s;
    }

    .chat-now-button:hover {
        background-color: #3d6293;
    }

    @media (max-width: 576px) {
        .chat-help-container {
            margin: 20px;
        }

        .chat-content {
            padding: 20px 15px;
        }
    }
</style>
@endsection
