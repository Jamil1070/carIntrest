<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\FaqAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route for serving profile photos
Route::get('/profile-photo/{filename}', function ($filename) {
    $path = storage_path('app/public/profile_photos/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
})->name('profile.photo');

// Route om een comment toe te voegen
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// About route
Route::get('/about', [AboutController::class, 'index'])->name('about');

// FAQ routes
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Password reset routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Profile routes
Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin routes voor FAQ beheer
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('faq', FaqAdminController::class);
    
    // Category routes
    Route::get('/faq-categories/create', [FaqAdminController::class, 'createCategory'])->name('faq.categories.create');
    Route::post('/faq-categories', [FaqAdminController::class, 'storeCategory'])->name('faq.categories.store');
    Route::get('/faq-categories/{category}/edit', [FaqAdminController::class, 'editCategory'])->name('faq.categories.edit');
    Route::put('/faq-categories/{category}', [FaqAdminController::class, 'updateCategory'])->name('faq.categories.update');
    Route::delete('/faq-categories/{category}', [FaqAdminController::class, 'destroyCategory'])->name('faq.categories.destroy');

    // User management routes
    Route::resource('users', UserAdminController::class);
    Route::post('/users/{user}/toggle-admin', [UserAdminController::class, 'toggleAdmin'])->name('users.toggle-admin');
});
