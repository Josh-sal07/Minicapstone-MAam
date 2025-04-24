@extends('layouts.technician')
@section('header','Upcoming Repairs')

@section('content')
    <div class="container">
        <h2>Upcoming Repairs</h2>

        @if($bookings->isEmpty())
            <div class="alert alert-warning">You have no upcoming repairs at the moment.</div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Repair ID</th>
                        <th>Customer Name</th>
                        <th>Scheduled Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $repair)
                        <tr>
                            <td>{{ $repair->id }}</td>
                            <td>{{ $repair->customer->name }}</td> <!-- Assuming a relationship exists between Repair and Customer -->
                            <td>{{ \Carbon\Carbon::parse($repair->scheduled_date)->format('M d, Y h:i A') }}</td>
                            <td>
                                @if($repair->status == 'scheduled')
                                    <span class="badge bg-info">Scheduled</span>
                                @elseif($repair->status == 'in_progress')
                                    <span class="badge bg-warning">In Progress</span>
                                @elseif($repair->status == 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-secondary">N/A</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('repair.details', $repair->id) }}" class="btn btn-primary btn-sm">View Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
