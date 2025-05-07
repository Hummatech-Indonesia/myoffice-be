<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SosmedAuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PasswordResetController;
use Illuminate\Auth\Events\PasswordReset;

Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail']);
Route::post('/reset-password', [PasswordResetController::class, 'reset']);
Route::get('/reset-password/{token}', function ($token) {
    return response()->json(['token' => $token]);
})->name('password.reset');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/login', function (Request $request) {
    return response()->json([
        'sukses' => true,
        'pesan' => 'Berhasil Verifikasi'
    ]);
})->name('login');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/auth/google/callback', [SosmedAuthController::class, 'googleCallback']);
Route::get('/auth/google/login', [SosmedAuthController::class, 'redirectToGoogle']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'verify'])
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailController::class, 'send'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});
