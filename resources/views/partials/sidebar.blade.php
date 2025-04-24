@php
    $role = auth()->user() ? auth()->user()->role : null;
@endphp

<aside class="w-64 bg-white shadow-lg h-screen p-4">
    @if ($role)
        <h2 class="text-xl font-bold mb-6">{{ ucfirst($role) }} Dashboard</h2>
        <ul class="space-y-4">
            @if($role === 'user')
                <li><a href="{{ route('user.bookings') }}">📦 Bookings</a></li>
                <li><a href="{{ route('user.account') }}">👤 Account</a></li>
                <li><a href="{{ route('user.notifications') }}">🔔 Notifications</a></li>
                <li><a href="{{ route('user.messages') }}">💬 Messages</a></li>
                <li><a href="{{ route('user.help') }}">🆘 Help & Support</a></li>
            @elseif($role === 'technician')
                <li><a href="{{ route('technician.bookings') }}">📋 All Repairs</a></li>
                <li><a href="{{ route('technician.bookings.upcoming') }}">📅 Upcoming Repairs</a></li>
                <li><a href="{{ route('technician.bookings.active') }}">🔧 Active Repairs</a></li>
                <li><a href="{{ route('technician.bookings.completed') }}">✅ Completed Repairs</a></li>
                <li><a href="{{ route('technician.profile') }}">👤 Profile</a></li>
                <li><a href="{{ route('technician.notifications') }}">🔔 Notifications</a></li>
                <li><a href="{{ route('technician.messages') }}">💬 Messages</a></li>
            @elseif($role === 'admin')
                <li><a href="{{ route('admin.dashboard') }}">📊 Dashboard</a></li>
                <li><a href="{{ route('admin.technicians.pending') }}">🕒 Pending Technicians</a></li>
                <li><a href="{{ route('admin.technicians.approved') }}">✅ Approved Technicians</a></li>
                <li><a href="{{ route('admin.technicians.rejected') }}">❌ Rejected Technicians</a></li>
                <li><a href="{{ route('admin.users') }}">👥 User Management</a></li>
                <li><a href="{{ route('admin.bookings') }}">📦 Repair Bookings</a></li>
                <li><a href="{{ route('admin.reports') }}">📈 Reports</a></li>
                <li><a href="{{ route('admin.settings') }}">⚙️ Settings</a></li>
                <li><a href="{{ route('admin.notifications') }}">🔔 Notifications</a></li>
                <li><a href="{{ route('admin.messages') }}">💬 Messages</a></li>
            @endif

            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">🚪 Log Out</button>
                </form>
            </li>
        </ul>
    @else

    @endif
</aside>
