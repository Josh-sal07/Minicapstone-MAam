<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Auth\LoginController,
    Auth\RegisterController,
    Auth\ForgotPasswordController,
    Auth\ResetPasswordController,
    AuthController,
    UserController,
    AdminController,
    TechnicianController,
    MessageController,
    BookingController,
    HelpController,
    NotificationController,
    DashboardController,
    TechnicianApplicationController,
    AdminDashboardController,
    UserDashboardController,
    TechnicianDashboardController,
    TechnicianBookingController,
    Admin\ReportController,
    Admin\SettingsController
};

// ====================
// PUBLIC ROUTES
// ====================

// Welcome Page
Route::get('/', fn () => view('welcome'))->name('welcome');

// Authentication
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Technician Application (Public + Auth)
Route::get('/technician/apply', [TechnicianApplicationController::class, 'create'])->name('technician.apply');
Route::post('/technician/apply', [TechnicianApplicationController::class, 'store'])->name('technician.apply');


// Password Reset
Route::prefix('password')->name('password.')->group(function () {
    Route::get('reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('request');
    Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email');
    Route::get('reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset');
    Route::post('reset', [ResetPasswordController::class, 'reset'])->name('update');
});

// ====================
// AUTHENTICATED ROUTES
// ====================

Route::middleware(['auth'])->group(function () {

    // --------------------
    // COMMON
    // --------------------
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'sendMessage'])->name('messages.send');
    Route::put('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('technician.bookings.status');

    // --------------------
    // USER
    // --------------------
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
        Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

        Route::get('/profile', [UserController::class, 'showProfile'])->name('account');
        Route::post('/profile', [UserController::class, 'update'])->name('account.update');

        Route::get('/messages', [MessageController::class, 'userMessage'])->name('messages');
        Route::get('/help', [HelpController::class, 'index'])->name('help');
        Route::get('/notifications', [NotificationController::class, 'uindex'])->name('notifications');
       
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    // --------------------
    // TECHNICIAN
    // --------------------
    Route::prefix('technician')->name('technician.')->group(function () {
        Route::get('/dashboard', [TechnicianController::class, 'dashboard'])->name('dashboard');

        Route::get('/bookings', [TechnicianController::class, 'bookings'])->name('bookings');
        Route::get('/bookings/upcoming', [TechnicianController::class, 'bookingsUpcoming'])->name('bookings.upcoming');
        Route::get('/bookings/active', [TechnicianController::class, 'bookingsActive'])->name('bookings.active');
        Route::get('/bookings/completed', [TechnicianController::class, 'bookingsCompleted'])->name('bookings.completed');
        Route::get('/bookings/all', [TechnicianController::class, 'allBookings'])->name('bookings.all');

        Route::get('/notifications', [TechnicianController::class, 'notifications'])->name('notifications');
        Route::get('/messages', [TechnicianController::class, 'messages'])->name('messages');
        Route::get('/profile', [TechnicianController::class, 'profile'])->name('profile');
        Route::get('/technician/profile', [TechnicianController::class, 'editProfile'])->name('technician.profile');
        Route::post('/technician/profile', [TechnicianController::class, 'updateProfile'])->name('technician.profile.update');
      

    });

    // --------------------
    // ADMIN
    // --------------------
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');



        // Technician Application Management
        Route::get('/technician-applications', [AdminController::class, 'viewApplications'])->name('technician.applications');
        Route::post('/technician-applications/{technician}/approve', [AdminController::class, 'approveApplication'])->name('technician.approve');
        Route::post('/technician-applications/{application}/reject', [AdminController::class, 'rejectApplication'])->name('technician.reject');


        // Technician Status Views
        Route::get('/technicians/pending', [AdminController::class, 'pendingTechnicians'])->name('technicians.pending');
        Route::get('/technicians/approved', [AdminController::class, 'approvedTechnicians'])->name('technicians.approved');
        Route::get('/technicians/rejected', [AdminController::class, 'rejectedTechnicians'])->name('technicians.rejected');

        // Dynamic status filtering
        Route::get('/technicians/{status}', [TechnicianController::class, 'index'])
            ->where('status', 'approved|rejected')->name('technicians.status');

        // Others
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/reports', [ReportController::class, 'index'])->name('reports');
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
        Route::get('/messages', [MessageController::class, 'index'])->name('messages');
    });

});


Route::get('/technician/profile', [TechnicianController::class, 'editProfile'])->name('technician.profile');
Route::post('/technician/profile', [TechnicianController::class, 'updateProfile'])->name('technician.profile.update');
Route::post('/technicians/{technician}/approve', [AdminController::class, 'approveTechnician'])->name('technicians.approve');


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/technicians/pending', [AdminController::class, 'pendingTechnicians'])->name('admin.technicians.pending');
    Route::post('/technicians/{id}/approve', [AdminController::class, 'approveTechnician'])->name('admin.technicians.approve');
    Route::post('/technicians/{id}/reject', [AdminController::class, 'rejectTechnician'])->name('admin.technicians.reject');
});




Route::middleware(['auth'])->prefix('technician')->name('technician.')->group(function () {
    Route::patch('/bookings/{booking}/status', [TechnicianBookingController::class, 'updateStatus'])->name('bookings.updateStatus');
});

Route::get('/technician/bookings', [TechnicianController::class, 'bookings'])->name('technician.bookings');
Route::get('/technician/bookings/upcoming', [TechnicianController::class, 'upcomingRepairs'])->name('technician.bookings.upcoming');

Route::get('/user/change-password', [UserController::class, 'changePassword'])->name('user.account.change-password');
Route::put('/user/change-password', [UserController::class, 'updatePassword'])->name('user.account.change-password.update');


Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('bookings', [BookingController::class, 'index'])->name('user.bookings');
    Route::get('bookings/{booking}/edit', [BookingController::class, 'edit'])->name('user.bookings.edit');
    Route::put('bookings/{booking}', [BookingController::class, 'update'])->name('user.bookings.update');
    Route::delete('bookings/{booking}', [BookingController::class, 'destroy'])->name('user.bookings.destroy');
});


Route::middleware(['auth', 'role:technician'])->group(function () {
    Route::post('/technician/bookings/{booking}/update-status/{status}', [TechnicianController::class, 'updateBookingStatus'])
        ->name('technician.updateBookingStatus');
});



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/technicians/pending', [AdminController::class, 'pendingTechnicians'])->name('admin.technicians.pending');
    Route::post('/admin/technicians/{id}/approve', [AdminController::class, 'approveTechnician'])->name('admin.technicians.approve');
    Route::post('/admin/technicians/{id}/reject', [AdminController::class, 'rejectTechnician'])->name('admin.technicians.reject');
});
