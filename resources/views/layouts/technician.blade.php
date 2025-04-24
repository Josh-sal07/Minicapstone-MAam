<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Technician Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-72 bg-gradient-to-b from-green-800 to-green-900 text-white shadow-xl">
            <div class="p-6">
                <div class="flex items-center mb-8">
                    <i class="fas fa-tools text-2xl mr-3"></i>
                    <h2 class="text-2xl font-bold">Technician Panel</h2>
                </div>

                <nav>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('technician.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <i class="fas fa-tachometer-alt mr-3 w-6 text-center"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('technician.bookings') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <i class="fas fa-clipboard-list mr-3 w-6 text-center"></i>
                                <span>All Repairs</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('technician.bookings.upcoming') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <i class="fas fa-calendar-alt mr-3 w-6 text-center"></i>
                                <span>Upcoming Repairs</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('technician.bookings.active') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <i class="fas fa-wrench mr-3 w-6 text-center"></i>
                                <span>Active Repairs</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('technician.bookings.completed') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <i class="fas fa-check-circle mr-3 w-6 text-center"></i>
                                <span>Completed Repairs</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('technician.notifications') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <i class="fas fa-bell mr-3 w-6 text-center"></i>
                                <span>Notifications</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('technician.messages') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <i class="fas fa-envelope mr-3 w-6 text-center"></i>
                                <span>Messages</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('technician.profile') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <i class="fas fa-user-circle mr-3 w-6 text-center"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="mt-auto p-6 border-t border-green-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-3 py-2 rounded-lg bg-red-600 hover:bg-red-700 transition-colors duration-200">
                        <i class="fas fa-sign-out-alt mr-3 w-6 text-center"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Content Area -->
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-8 py-4">
                    <h1 class="text-2xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h1>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bell"></i>
                        </button>
                        <div class="relative">
                            <button class="flex items-center focus:outline-none">
                                <div class="h-9 w-9 rounded-full bg-green-600 flex items-center justify-center text-white">
                                    <i class="fas fa-user"></i>
                                </div>
                                <a href="{{ route('technician.profile') }}" >
                                <span class="ml-2 text-gray-700">Profile</span>
                                <i class="fas fa-chevron-down ml-2 text-gray-500 text-xs"></i>
                            </a>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
