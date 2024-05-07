<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/login-form', function () {
        return view('admin.login');
    });
    Route::post('/login', [AuthController::class, 'adminLogin']);

    // Admin Middleware
    Route::middleware('is_admin')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        });
    });
});

// User
Route::prefix('user')->group(function () {
    Route::get('/login-form', function () {
        return view('user.login');
    });
    Route::post('/login', [AuthController::class, 'userLogin']);
    // User Middleware
    Route::middleware('is_user')->group(function () {
        Route::get('/', function () {
            return view('user.dashboard');
        });
    });
});

Route::get('/logout', [AuthController::class, 'logout']);
