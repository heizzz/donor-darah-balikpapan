<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\AppointmentController as UserAppointmentController;
use App\Http\Controllers\User\StockController as UserStockController;
use App\Http\Controllers\Hospital\UserController as HospitalUserController;
use App\Http\Controllers\Hospital\HomeController as HospitalHomeController;
use App\Http\Controllers\Hospital\AppointmentController as HospitalAppointmentController;
use App\Http\Controllers\Hospital\StockController as HospitalStockController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\HospitalController as AdminHospitalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::group(['prefix' => '/'], function(){
    Route::get('home', [UserHomeController::class, 'index'])->name('user-home');
    
    Route::group(['prefix' => 'account'], function(){
        Route::get('/', [UserUserController::class, 'index'])->name('user-account-index');
        Route::get('/edit', [UserUserController::class, 'editProfile'])->name('user-profile-edit');
        Route::put('/update', [UserUserController::class, 'updateProfile'])->name('user-profile-update');
        Route::get('/change-password', [UserUserController::class, 'changePassword'])->name('user-password-edit');
        Route::put('/change-password', [UserUserController::class, 'updatePassword'])->name('user-password-update');
    });

    Route::group(['prefix' => 'stocks'], function(){
        Route::get('/', [UserStockController::class, 'index'])->name('user-stock-index');
        Route::get('/detail/{id}', [UserStockController::class, 'detail'])->name('user-stock-detail');
    });

    Route::group(['prefix' => 'appointments'], function(){
        Route::get('/create', [UserAppointmentController::class, 'create'])->name('user-appointment-create');
        Route::post('/store', [UserAppointmentController::class, 'store'])->name('user-appointment-store');
        Route::get('/history', [UserAppointmentController::class, 'history'])->name('user-appointment-history');
        Route::get('/detail', [UserAppointmentController::class, 'appointmentDetail'])->name('user-appointment-detail');
        Route::get('/blood/detail', [UserAppointmentController::class, 'donorDetail'])->name('user-appointment-blood-detail');
    });
});

// Route::group(['prefix' => 'admin', 'middleware' => ['member']], function(){
Route::group(['prefix' => 'admin'], function(){
    Route::get('home', [AdminHomeController::class, 'index'])->name('admin-home');

    Route::group(['prefix' => 'hospitals'], function(){
        Route::get('/', [AdminHospitalController::class, 'index'])->name('admin-hospital-index');
        Route::get('create', [AdminHospitalController::class, 'create'])->name('admin-hospital-create');
        Route::post('store', [AdminHospitalController::class, 'store'])->name('admin-hospital-store');
        Route::get('{id}', [AdminHospitalController::class, 'detail'])->name('admin-hospital-detail');
        Route::put('{id}/update', [AdminHospitalController::class, 'update'])->name('admin-hospital-update');
        Route::delete('{id}/delete', [AdminHospitalController::class, 'delete'])->name('admin-hospital-delete');
    });
});

Route::group(['prefix' => 'hospital'], function(){
    Route::get('home', [HospitalHomeController::class, 'index'])->name('rs-home');

    Route::group(['prefix' => 'account'], function(){
        Route::get('/', [HospitalUserController::class, 'index'])->name('rs-account-index');
        Route::get('/edit', [HospitalUserController::class, 'editProfile'])->name('rs-profile-edit');
        Route::put('/update', [HospitalUserController::class, 'updateProfile'])->name('rs-profile-update');
        Route::get('/change-password', [HospitalUserController::class, 'changePassword'])->name('rs-password-edit');
        Route::put('/change-password', [HospitalUserController::class, 'updatePassword'])->name('rs-password-update');
    });

    Route::group(['prefix' => 'stocks'], function(){
        Route::get('/', [HospitalStockController::class, 'index'])->name('rs-stock-index');
        Route::put('update', [HospitalStockController::class, 'update'])->name('rs-stock-update');
    });

    Route::group(['prefix' => 'appointments'], function(){
        Route::get('incoming', [HospitalAppointmentController::class, 'incoming'])->name('rs-appointment-incoming');
        Route::get('list', [HospitalAppointmentController::class, 'list'])->name('rs-appointment-list');
        Route::get('detail/{id}', [HospitalAppointmentController::class, 'detail'])->name('rs-appointment-detail');
        Route::put('detail/{id}', [HospitalAppointmentController::class, 'changeStatus'])->name('rs-appointment-change-status');
        Route::post('detail/store', [HospitalAppointmentController::class, 'store'])->name('rs-appointment-store');
        Route::get('scan', [HospitalAppointmentController::class, 'scan'])->name('rs-appointment-scan');
    });
});
