<?php
use App\Livewire\PackagesList;

Route::get('/', PackagesList::class);

// use Illuminate\Support\Facades\Route;
// use App\Livewire\User\PackageRequestsList;
use App\Livewire\PackageDetails;
// use App\Livewire\PackagesList;


// Route::get('/', PackagesList::class)->name('home');

// // Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/package/{id}', PackageDetails::class)->name('package.show');


// Route::middleware(['auth'])->group(function () {
//     Route::get('/myreq', PackageRequestsList::class)->name('user.requests');
// });
// require __DIR__.'/auth.php';
