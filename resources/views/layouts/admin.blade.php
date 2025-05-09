<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-72 bg-gradient-to-b from-blue-900 to-blue-980 text-white shadow-xl">
            <div class="p-6">
                <div class="flex items-center mb-8">
                    <i class="fas fa-shield-alt text-2xl mr-3"></i>
                    <h2 class="text-2xl font-bold">Admin Panel</h2>
                </div>

                <nav>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-800 transition-colors duration-200">
                                <i class="fas fa-tachometer-alt mr-3 w-6 text-center"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-800 transition-colors duration-200">
                                <i class="fas fa-users mr-3 w-6 text-center"></i>
                                <span>All Customers</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.technicians.pending') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-800 transition-colors duration-200">
                                <i class="fas fa-user-clock mr-3 w-6 text-center"></i>
                                <span>Pending Technicians</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.technicians.approved') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-800 transition-colors duration-200">
                                <i class="fas fa-user-check mr-3 w-6 text-center"></i>
                                <span>Approved Technicians</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.technicians.rejected') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-800 transition-colors duration-200">
                                <i class="fas fa-user-times mr-3 w-6 text-center"></i>
                                <span>Rejected Technicians</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-800 transition-colors duration-200">
                                <i class="fas fa-cogs mr-3 w-6 text-center"></i>
                                <span>System Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.notifications') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-800 transition-colors duration-200">
                                <i class="fas fa-bell mr-3 w-6 text-center"></i>
                                <span>Notifications</span>
                            </a>
                        </li>
        
                    </ul>
                </nav>
            </div>

            <div class="mt-auto p-6 border-t border-blue-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-3 rounded-lg bg-red-600 hover:bg-red-700 transition-colors duration-200">
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
                    <h1 class="text-2xl font-semibold text-gray-800">@yield('header', 'Admin Dashboard')</h1>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bell"></i>
                        </button>
                        <div class="relative">
                            <button class="flex items-center focus:outline-none">
                                <div class="h-9 w-9 rounded-full bg-blue-900 flex items-center justify-center text-white">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <span class="ml-2 text-gray-700">Administrator</span>
                                <i class="fas fa-chevron-down ml-2 text-gray-500 text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="p-8 bg-gray-50">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
