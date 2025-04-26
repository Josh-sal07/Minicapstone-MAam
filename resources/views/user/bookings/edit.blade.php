@extends('layouts.user')
@section('header', 'Edit Booking')
@section('content')

<style>
    .form-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 2rem;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        font-size: 2rem;
        font-weight: 600;
        color: #343a40;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #495057;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border-radius: 6px;
        border: 1px solid #ced4da;
    }

    .submit-btn {
        background-color: #4c9aff;
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: #3a7bc7;
    }
</style>

<div class="form-container">
    <h1 class="form-title">Edit Your Booking</h1>

    <form action="{{ route('user.bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="device" class="form-label">Device</label>
            <input type="text" id="device" name="device" class="form-control" value="{{ old('device', $booking->device) }}" required>
        </div>

        <div class="form-group">
            <label for="technician_id" class="form-label">Select Technician</label>
            <select name="technician_id" id="technician_id" class="form-control" required>
                <option value="">Choose Technician</option>
                @foreach($technicians as $technician)
                    <option value="{{ $technician->id }}" {{ $technician->id == $booking->technician_id ? 'selected' : '' }}>
                        {{ $technician->name }} — {{ $technician->location ?? 'N/A' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="cash" {{ $booking->payment_method == 'cash' ? 'selected' : '' }}>Cash on Repair</option>
                <option value="downpayment" {{ $booking->payment_method == 'downpayment' ? 'selected' : '' }}>Downpayment</option>
            </select>
        </div>

        <div class="form-group">
            <label for="issue" class="form-label">Issue Description</label>
            <textarea name="issue" id="issue" rows="4" class="form-control" required>{{ old('issue', $booking->issue) }}</textarea>
        </div>

        <button type="submit" class="submit-btn">Update Booking</button>
    </form>
</div>

@endsection
