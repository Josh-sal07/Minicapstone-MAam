@extends('layouts.user')
@section('title', 'My Bookings')
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

    .bookings-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .page-header {
        margin-bottom: 2rem;
    }

    .page-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0;
    }

    .page-title span {
        color: var(--primary);
    }

    .booking-form {
        background-color: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-label {
        display: block;
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: var(--dark);
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--light-gray);
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    textarea.form-control {
        min-height: 120px;
    }

    .submit-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.8rem 1.5rem;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        background: linear-gradient(90deg, var(--primary-dark), var(--secondary));
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(67, 97, 238, 0.3);
    }

    .bookings-section {
        background-color: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 1.5rem;
    }

    .bookings-table {
        width: 100%;
        border-collapse: collapse;
    }

    .bookings-table thead {
        background-color: var(--light);
    }

    .bookings-table th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: var(--dark);
        border-bottom: 2px solid var(--light-gray);
    }

    .bookings-table td {
        padding: 1rem;
        border-bottom: 1px solid var(--light-gray);
        color: var(--gray);
    }

    .bookings-table tr:last-child td {
        border-bottom: none;
    }

    .status-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .status-pending {
        background-color: rgba(248, 150, 30, 0.1);
        color: var(--warning);
    }

    .status-in-progress {
        background-color: rgba(67, 97, 238, 0.1);
        color: var(--primary);
    }

    .status-completed {
        background-color: rgba(75, 181, 67, 0.1);
        color: var(--success);
    }

    .status-cancelled {
        background-color: rgba(249, 65, 68, 0.1);
        color: var(--danger);
    }

    .empty-state {
        text-align: center;
        padding: 2rem;
        color: var(--gray);
    }

    .empty-icon {
        font-size: 2rem;
        margin-bottom: 1rem;
        color: var(--light-gray);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .bookings-container {
            padding: 1.5rem;
        }

        .bookings-table {
            display: block;
            overflow-x: auto;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="bookings-container">
    <div class="page-header">
        <h1 class="page-title">My <span>Repair Bookings</span></h1>
    </div>

    <!-- Booking Form -->
    <form action="{{ route('user.bookings') }}" method="POST" class="booking-form">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label for="device" class="form-label">Device</label>
                <input type="text" name="device" id="device" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="technician_id" class="form-label">Select Technician</label>
                <select name="technician_id" id="technician_id" class="form-control" required>
                    <option value="">Choose Technician</option>
                    @foreach($technicians as $technician)
                        <option value="{{ $technician->id }}">
                            {{ $technician->name }} — {{ $technician->location ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select name="payment_method" id="payment_method" class="form-control" required>
                    <option value="cash">Cash on Repair</option>
                    <option value="downpayment">Downpayment</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="issue" class="form-label">Issue Description</label>
            <textarea name="issue" id="issue" rows="4" class="form-control" required></textarea>
        </div>

        <button type="submit" class="submit-btn">
            <i class="fas fa-calendar-plus mr-2"></i> Book Repair
        </button>
    </form>

    <!-- Booking History -->
    <div class="bookings-section">
        <h2 class="section-title">Your Booking History</h2>

        @if($bookings->count())
            <table class="bookings-table">
                <thead>
                    <tr>
                        <th>Device</th>
                        <th>Issue</th>
                        <th>Status</th>
                        <th>Technician</th>
                        <th>Payment</th>
                        <th>Booked At</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->device }}</td>
                            <td>{{ Str::limit($booking->issue, 30) }}</td>
                            <td>
                                <span class="status-badge status-{{ str_replace(' ', '-', $booking->status) }}">
                                    {{ $booking->status }}
                                </span>
                            </td>
                            <td>
                                {{ $booking->technician ? $booking->technician->name : 'Pending' }}
                            </td>
                            <td class="capitalize">{{ $booking->payment_method ?? 'Not Set' }}</td>
                            <td>{{ $booking->created_at->format('M d, Y') }}</td>
                            <td>
                                <form action="{{ route('user.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this booking?')" class="text-red-500 hover:underline mr-2">
                                        Delete
                                    </button>
                                </form>
                                <a href="{{ route('user.bookings.edit', $booking->id) }}" class="text-blue-600 hover:underline">
                                    Edit
                                </a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-calendar-times"></i>
                </div>
                <p>You have no bookings yet</p>
                <p>Book your first repair to get started</p>
            </div>
        @endif
    </div>
</div>
@endsection