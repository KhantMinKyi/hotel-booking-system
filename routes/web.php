<?php

use App\Http\Controllers\AmenityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomAnalysisController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoomListController;
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

Route::get('/', [RoomTypeController::class, 'dashboradIndex'])->name('welcome.index');

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/login-form', function () {
        return view('admin.login');
    });
    Route::post('/login', [AuthController::class, 'adminLogin']);
    // Admin Middleware
    Route::middleware('is_admin')->group(function () {
        Route::get('/', [LocationController::class, 'adminDashboard'])->name('admin.index');
        Route::get('/booking_list', [LocationController::class, 'adminBookingList'])->name('admin.booking_list');
        Route::resource('amenity', AmenityController::class);
        Route::resource('room_type', RoomTypeController::class);
        Route::resource('room', RoomController::class);
        Route::resource('user_list', UserController::class);
        Route::get('booking_confrim/{room_booking}', [RoomBookingController::class, 'adminBookingConfirmShow'])->name('admin.bookingConfrimShow');
        Route::put('booking_confrim/{room_booking}', [RoomBookingController::class, 'adminBookingConfirm'])->name('admin.adminBookingConfirm');
        Route::get('room_booking_create', [RoomBookingController::class, 'bookingCreate'])->name('admin.room_booking.create');
        Route::post('room_booking_store', [RoomBookingController::class, 'bookingStore'])->name('admin_room_booking.store');
        Route::get('room_analysis', [RoomAnalysisController::class, 'roomAnalysisList'])->name('admin.room_analysis.index');
    });
});

// User
Route::prefix('user')->group(function () {
    Route::get('/login-form', function () {
        return view('user.login');
    });
    Route::get('/signup', function () {
        return view('user.signup');
    })->name('user.signup');
    Route::post('/user_store', [UserController::class, 'userStore'])->name('user.user_store');
    Route::post('/login', [AuthController::class, 'userLogin']);
    // User Middleware
    Route::middleware('is_user')->group(function () {
        Route::get('/hotel_about', function () {
            return view('user.hotel_about');
        })->name('hotel_about.index');
        Route::get('/', [UserRoomListController::class, 'userDashboard'])->name('user.index');
        Route::resource('user_room_list', UserRoomListController::class);
        Route::resource('user_room_booking', RoomBookingController::class);
        Route::resource('user_room_review', ReviewController::class);
        Route::post('user_room_booking/search_view', [RoomBookingController::class, 'searchRoom'])->name('user_room_booking.search_view');
        Route::post('user_room_booking/search_room_price_view', [RoomBookingController::class, 'searchRoomPriceView'])->name('user_room_booking.search_room_price_view');
        Route::get('user_room_list_room/room_type_detail', [UserRoomListController::class, 'roomTypeDetail'])->name('user_room_list.roomTypeDetail');
        Route::get('user_account', [UserController::class, 'userAccountDetail'])->name('user.user_account');
        Route::get('user_edit', [UserController::class, 'userEdit'])->name('user.user_edit');
        Route::put('user_update', [UserController::class, 'userUpdate'])->name('user.user_update');
        Route::get('user_change_password', [UserController::class, 'userChangePasswordShow'])->name('user.user_change_password_show');
        Route::put('user_password_update', [UserController::class, 'userPasswordUpdate'])->name('user.user_password_update');
    });
});
Route::get('/hotel_about', function () {
    return view('hotel_about');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
