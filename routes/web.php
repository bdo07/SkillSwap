<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('skills', App\Http\Controllers\SkillController::class);
Route::resource('profiles', App\Http\Controllers\UserProfileController::class)->middleware('auth');
Route::get('matching', [App\Http\Controllers\UserMatchController::class, 'index'])->middleware('auth')->name('matching.index');
Route::post('matching/{user}', [App\Http\Controllers\UserMatchController::class, 'store'])->middleware('auth')->name('matching.store');
Route::get('messages/{match}', [App\Http\Controllers\MessageController::class, 'show'])->middleware('auth')->name('messages.show');
Route::post('messages/{match}', [App\Http\Controllers\MessageController::class, 'store'])->middleware('auth')->name('messages.store');
Route::get('ratings/{match}', [App\Http\Controllers\RatingController::class, 'create'])->middleware('auth')->name('ratings.create');
Route::post('ratings/{match}', [App\Http\Controllers\RatingController::class, 'store'])->middleware('auth')->name('ratings.store');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::post('/users/{user}/suspend', [App\Http\Controllers\AdminController::class, 'suspend'])->name('admin.users.suspend');
    Route::delete('/users/{user}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/reports', [App\Http\Controllers\AdminController::class, 'reports'])->name('admin.reports');
    Route::post('/reports/{report}/resolve', [App\Http\Controllers\AdminController::class, 'resolveReport'])->name('admin.reports.resolve');
});

require __DIR__.'/auth.php';
