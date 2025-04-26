<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    @stack('styles')
    <style>
        .sidebar {
            transition: width 0.3s ease;
        }
        .sidebar.collapsed {
            width: 4rem;
        }
        .sidebar-content {
            transition: opacity 0.2s ease;
        }
        .sidebar.collapsed .sidebar-content {
            opacity: 0;
            visibility: hidden;
        }
        .sidebar.collapsed .sidebar-toggle-icon .fa-angle-left {
            transform: rotate(180deg);
        }
        .sidebar-toggle-icon {
            transition: transform 0.3s ease;
        }
        .nav-item {
            position: relative;
        }
        .tooltip {
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            background-color: #2d3748;
            color: white;
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease, visibility 0.2s ease;
            z-index: 50;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .tooltip::before {
            content: '';
            position: absolute;
            left: -6px;
            top: 50%;
            transform: translateY(-50%);
            border-width: 6px 6px 6px 0;
            border-style: solid;
            border-color: transparent #2d3748 transparent transparent;
        }
        .sidebar.collapsed .nav-item:hover .tooltip {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar w-72 bg-gradient-to-b from-blue-700 to-blue-800 text-white shadow-xl relative">
            <!-- Sidebar Toggle Button -->
            <button id="sidebarToggle" class="absolute -right-3 top-6 bg-blue-700 text-white p-1 rounded-full shadow-lg z-10">
                <span class="sidebar-toggle-icon block">
                    <i class="fas fa-angle-left"></i>
                </span>
            </button>
            
            <div class="p-6">
                <div class="flex items-center mb-8 sidebar-content">
                    <i class="fas fa-user-circle text-2xl mr-3"></i>
                    <h2 class="text-2xl font-bold">Costumer Panel</h2>
                </div>

                <nav>
                    <ul class="space-y-1">
                        <li class="nav-item">
                            <a href="{{ route('user.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-tachometer-alt mr-3 w-6 text-center"></i>
                                <span class="sidebar-content">Dashboard</span>
                            </a>
                            <div class="tooltip">Dashboard</div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.bookings') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-calendar-plus mr-3 w-6 text-center"></i>
                                <span class="sidebar-content">Book a Repair</span>
                            </a>
                            <div class="tooltip">Book a Repair</div>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('user.messages') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-comment-alt mr-3 w-6 text-center"></i>
                                <span class="sidebar-content">Messages</span>
                            </a>
                            <div class="tooltip">Messages</div>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('user.account') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-user-cog mr-3 w-6 text-center"></i>
                                <span class="sidebar-content">Account/Profile</span>
                            </a>
                            <div class="tooltip">Account/Profile</div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.notifications') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-bell mr-3 w-6 text-center"></i>
                                <span class="sidebar-content">Notifications</span>
                            </a>
                            
                            <div class="tooltip">Notifications</div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.help') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-question-circle mr-3 w-6 text-center"></i>
                                <span class="sidebar-content">Help & Support</span>
                            </a>
                            <div class="tooltip">Help & Support</div>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="mt-auto p-6 border-t border-blue-600 sidebar-content">
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
                                <div class="h-9 w-9 rounded-full bg-blue-600 flex items-center justify-center text-white">
                                    <i class="fas fa-user"></i>
                                </div>
                                <a href="{{ route('user.account') }}">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
            });
        });
    </script>
</body>
</html>