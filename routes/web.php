<?php

use Illuminate\Support\Facades\Route;

// Authenticated Routes
require __DIR__.'/auth.php';

// Frontend Routes
require __DIR__.'/frontend.php';

// Backend Routes
require __DIR__.'/backend.php';

// Privacy Policy Route
Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy');
})->name('privacy-policy');
