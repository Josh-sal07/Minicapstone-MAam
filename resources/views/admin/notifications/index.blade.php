@extends('layouts.admin')

@section('header', 'My Notifications')

@section('content')
  <div class="container">
    <h1>Your Notifications</h1>

    @if($notifications->count())
      <ul>
        @foreach($notifications as $notification)
          <li>
            <div>
              <strong>{{ $notification->data['title'] }}</strong>
              <span class="time"> - {{ $notification->created_at->diffForHumans() }}</span>
            </div>
            <p>{{ $notification->data['message'] }}</p>
          </li>
        @endforeach
      </ul>
    @else
      <p>You have no notifications.</p>
    @endif
  </div>
@endsection

@push('styles')
  <style>
    /* Global Styles */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f2f5;
      margin: 0;
      padding: 20px;
      color: #333;
    }

    /* Container */
    .container {
      max-width: 800px;
      margin: 0 auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    /* Headings */
    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #2c3e50;
    }

    /* Notification List */
    ul {
      list-style: none;
      padding: 0;
    }

    li {
      background: #f9f9f9;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 15px;
      margin-bottom: 15px;
      transition: background-color 0.3s ease;
    }

    li:hover {
      background-color: #f1f1f1;
    }

    /* Notification Title and Time */
    li strong {
      font-size: 1.1em;
      color: #2980b9;
    }

    li span.time {
      font-size: 0.9em;
      color: #999;
    }

    /* Notification Message */
    li p {
      margin: 8px 0 0;
      line-height: 1.5;
    }
  </style>
@endpush
