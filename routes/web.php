<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Volt::route('/', 'pages/home')->name('home');
Volt::route('/services', 'pages/sub-pages/services')->name('services');
Volt::route('/about', 'pages/sub-pages/about')->name('about');
Volt::route('/contact', 'pages/sub-pages/contact')->name('contact');
// Volt::route('/track', 'pages/sub-pages/track')->name('track');

Volt::route('/shipment-form', 'pages/sub-pages/shipment-form')->name('shipment.form');
Volt::route('/shipment-track', 'pages/sub-pages/shipment-track')->name('shipment.track');
Volt::route('/dashboard', 'pages/sub-pages/admin-shipment-list')->middleware(['auth'])->name('dashboard');





// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

require __DIR__.'/auth.php';
