<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Middleware\FilterByLanguage;
use Illuminate\Support\Facades\Route;

// use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
  Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
  Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
  Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
  Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth:sanctum')->group(function () {
  Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
  Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:6,1')->name('verification.send');

  Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
});

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//   return $request->user();
// });
// Route::middleware('auth:api')->group(function () {
// USERS
Route::apiResource('users', UserController::class);

// SERVICES

Route::get('/services/{lang}', [ServiceController::class, 'indexByLanguage'])->middleware(FilterByLanguage::class);
Route::get('/services/{id}/{lang}', [ServiceController::class, 'show'])->middleware(FilterByLanguage::class);
Route::post('/services', [ServiceController::class, 'store']);
Route::put('/services/{service}', [ServiceController::class, 'update']);
Route::delete('/services/{service}', [ServiceController::class, 'destroy']);

Route::get('/destinations/{lang}', [DestinationController::class, 'indexByLanguage'])->middleware(FilterByLanguage::class);
Route::get('/destinations/{id}/{lang}', [DestinationController::class, 'show'])->middleware(FilterByLanguage::class);
Route::post('/destinations', [DestinationController::class, 'store']);
Route::put('/destinations/{destination}', [DestinationController::class, 'update']);
Route::delete('/destinations/{destination}', [DestinationController::class, 'destroy']);
//blog
Route::get('/blogs/{lang}', [BlogController::class, 'indexByLanguage'])->middleware(FilterByLanguage::class);
Route::get('/blogs/{id}/{lang}', [BlogController::class, 'show'])->middleware(FilterByLanguage::class);
Route::apiResource('blogs', BlogController::class);
// });
