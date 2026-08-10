<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuestController;
use App\Http\Controllers\Admin\RsvpController as AdminRsvpController;
use App\Http\Controllers\Admin\GuestbookController as AdminGuestbookController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// ========================================
// PUBLIC ROUTES - Wedding Invitation
// ========================================
Route::get('/', [InvitationController::class, 'index'])->name('invitation');

Route::middleware('throttle:5,1')->group(function () {
    Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');
    Route::post('/guestbook', [GuestbookController::class, 'store'])->name('guestbook.store');
});

// ========================================
// ADMIN AUTH ROUTES
// ========================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ========================================
    // ADMIN PROTECTED ROUTES
    // ========================================
    Route::middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Guests
        Route::resource('guests', GuestController::class)->except(['show']);

        // RSVPs
        Route::get('/rsvps', [AdminRsvpController::class, 'index'])->name('rsvps.index');
        Route::delete('/rsvps/{rsvp}', [AdminRsvpController::class, 'destroy'])->name('rsvps.destroy');

        // Guestbooks
        Route::get('/guestbooks', [AdminGuestbookController::class, 'index'])->name('guestbooks.index');
        Route::patch('/guestbooks/{guestbook}/toggle', [AdminGuestbookController::class, 'toggleStatus'])->name('guestbooks.toggle');
        Route::delete('/guestbooks/{guestbook}', [AdminGuestbookController::class, 'destroy'])->name('guestbooks.destroy');

        // Gallery
        Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
        Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
        Route::post('/gallery/reorder', [GalleryController::class, 'reorder'])->name('gallery.reorder');

        // Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});

