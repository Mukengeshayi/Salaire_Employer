<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class, 'login'])->name('login');
Route::post('/',[AuthController::class, 'handleLogin'])->name('handleLogin');

# secure Route
Route::get('/dashbord',[AppController::class, 'index'])->name('dashboard');
