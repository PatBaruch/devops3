<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

// Set the root route to the ItemController index method

Route::get('/', [HomeController::class, 'index'])->name('home');
// Group routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Resource routes for items
    Route::resource('items', ItemController::class);

    // Route to the home page
    Route::get('/home', [ItemController::class, 'index']);
});

// Authentication routes
Auth::routes();
