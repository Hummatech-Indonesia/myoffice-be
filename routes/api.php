<?php

use App\Http\Controllers\Auth\EmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SosmedAuthController;

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