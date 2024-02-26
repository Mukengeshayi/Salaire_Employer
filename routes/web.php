<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class, 'login'])->name('login');
Route::post('/',[AuthController::class, 'handleLogin'])->name('handleLogin');

# secure Routes

// Route::middleware('auth')->group(function () {
    Route::get('/dashbord',[AppController::class, 'index'])->name('dashboard');

    Route::prefix('departements')->group(function () {
        Route::get('/', [DepartementController::class, 'index'])->name('departement.index');
        Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
        Route::post('/create', [DepartementController::class, 'store'])->name('departement.store');
        Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit');
        Route::put('/update/{departement}', [DepartementController::class, 'update'])->name('departement.update');
        Route::get('/delete/{departement}', [DepartementController::class, 'delete'])->name('departement.delete');

    });

    Route::prefix('employers')->group(function () {
        Route::get('/', [EmployerController::class, 'index'])->name('employer.index');
        Route::get('/create', [EmployerController::class, 'create'])->name('employer.create');
        Route::post('/create', [EmployerController::class, 'store'])->name('employer.store');
        Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit');
        Route::put('/update/{employer}', [EmployerController::class, 'update'])->name('employer.update');
        Route::get('/delete/{employer}', [EmployerController::class, 'delete'])->name('employer.delete');
    });

    Route::prefix('configuration')->group(function () {
        Route::get('/', [ConfigurationController::class, 'index'])->name('configuration.index');
        Route::get('/create', [ConfigurationController::class, 'create'])->name('configuration.create');
        Route::post('/create', [ConfigurationController::class, 'store'])->name('configuration.store');
        Route::get('/delete/{configuration}', [ConfigurationController::class, 'destroy'])->name('configuration.delete');
    });
    Route::prefix('administrateurs')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('administrateur.index');
        Route::get('/create', [AdminController::class, 'create'])->name('administrateur.create');
        Route::post('/create', [AdminController::class, 'store'])->name('administrateur.store');
        Route::get('/edit/{admin}', [AdminController::class, 'edit'])->name('administrateur.edit');
        Route::put('/update/{admin}', [AdminController::class, 'update'])->name('administrateur.update');
        Route::get('/delete/{admin}', [AdminController::class, 'destroy'])->name('administrateur.delete');
    });
    Route::prefix('payment')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('payments');
    });
// });
