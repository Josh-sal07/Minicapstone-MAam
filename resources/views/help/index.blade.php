@extends('layouts.user')

@section('title', 'Help & Support')

@section('content')
  <div class="container">
    <h1>Help & Support</h1>
    <p>If you need help, you can refer to the following sections:</p>
    <ul>
      <li><a href="#faq">FAQ</a></li>
      <li><a href="#contact">Contact Support</a></li>
    </ul>

    <h2 id="faq">Frequently Asked Questions</h2>
    <p>Here you can add common questions and answers for users.</p>

    <h2 id="contact">Contact Support</h2>
    <p>If you still need help, you can reach our support team at
      <a href="mailto:support@example.com">support@example.com</a>.
    </p>
  </div>
@endsection

@push('styles')
  <style>
    /* Global Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f7f7f7;
      color: #333;
    }

    /* Container */
    .container {
      max-width: 800px;
      margin: 0 auto;
      background-color: #fff;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 8px;
    }

    /* Headings */
    h1 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 20px;
    }

    h2 {
      color: #2c3e50;
      margin-top: 30px;
    }

    /* Paragraphs */
    p {
      line-height: 1.6;
    }

    /* List Styles */
    ul {
      list-style-type: none;
      padding: 0;
      text-align: center;
    }

    li {
      display: inline-block;
      margin: 0 10px;
    }

    li a {
      text-decoration: none;
      color: #2980b9;
      font-weight: bold;
    }

    li a:hover {
      text-decoration: underline;
    }

    /* Email Link */
    a[href^="mailto:"] {
      color: #2980b9;
    }
  </style>
@endpush
