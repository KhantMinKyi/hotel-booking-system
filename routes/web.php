<?php

use App\Http\Controllers\AmenityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
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
})->name('welcome.index');

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
        })->name('admin.index');
        Route::resource('amenity', AmenityController::class);
        Route::resource('room_type', RoomTypeController::class);
        Route::resource('room', RoomController::class);
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
        })->name('user.index');
    });
});

Route::get('/logout', [AuthController::class, 'logout']);
