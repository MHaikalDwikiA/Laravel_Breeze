<?php

use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class);


Route::middleware('auth')->group(function () {
    Route::get('timeline', TimelineController::class)->name('timeline');
    Route::post('status', [StatusController::class, 'store'])->name('statuses.store');
    Route::get('explore', ExploreUserController::class)->name('users.index');
});

Route::prefix('profile')->group(function() {

    Route::get('password/edit', [UpdatePasswordController::class, 'edit'])->name('password.edit');
    Route::put('password/edit', [UpdatePasswordController::class, 'update']);

    Route::get('edit', [UpdateProfileController::class, 'edit'])->name('profile.edit');
    Route::put('update', [UpdateProfileController::class, 'update'])->name('profile.update');

    Route::get('{user}', ProfileInformationController::class)->name('profile');
    Route::get('{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
    Route::post('{user}', [FollowingController::class, 'store'])->name('following.store');
});

require __DIR__ . '/auth.php';
