<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route om een comment toe te voegen
Route::post('/cars/{car}/comments', [CommentController::class, 'store'])->name('comments.store');
