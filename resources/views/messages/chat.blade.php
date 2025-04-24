@extends('layouts.app')

@section('content')
<h2>Chat with {{ $receiver->name }}</h2>

<div style="height: 300px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px;">
    @foreach($messages as $msg)
        <div style="text-align: {{ $msg->sender_id === auth()->id() ? 'right' : 'left' }}">
            <p><strong>{{ $msg->sender->name }}:</strong> {{ $msg->message }}</p>
            <small>{{ $msg->created_at->diffForHumans() }}</small>
        </div>
        <hr>
    @endforeach
</div>

<form method="POST" action="{{ route('messages.send') }}">
    @csrf
    <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
    <textarea name="message" rows="3" class="form-control" required></textarea>
    <button type="submit" class="btn btn-primary mt-2">Send</button>
</form>
@endsection
