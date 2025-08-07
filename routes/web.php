<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Admin\FaqAdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route om een comment toe te voegen
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// FAQ routes
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Admin routes voor FAQ beheer
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('faq', FaqAdminController::class);
    
    // Category routes
    Route::get('/faq-categories/create', [FaqAdminController::class, 'createCategory'])->name('faq.categories.create');
    Route::post('/faq-categories', [FaqAdminController::class, 'storeCategory'])->name('faq.categories.store');
    Route::get('/faq-categories/{category}/edit', [FaqAdminController::class, 'editCategory'])->name('faq.categories.edit');
    Route::put('/faq-categories/{category}', [FaqAdminController::class, 'updateCategory'])->name('faq.categories.update');
    Route::delete('/faq-categories/{category}', [FaqAdminController::class, 'destroyCategory'])->name('faq.categories.destroy');
});
