<?php

use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');


Route::middleware('auth')->group(function () {
    Route::get('timeline', TimelineController::class)->name('timeline');
    Route::post('status', [StatusController::class, 'store'])->name('statuses.store');
    Route::get('profile/{user}', ProfileInformationController::class)->name('profile');
    Route::get('profile/{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
    Route::post('profile/{user}', [FollowingController::class, 'store'])->name('following.store');
    Route::get('explore', ExploreUserController::class)->name('users.index');
});

require __DIR__ . '/auth.php';
