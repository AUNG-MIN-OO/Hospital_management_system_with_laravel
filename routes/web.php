<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('main');

Route::get('/add-doctor-view',[\App\Http\Controllers\AdminController::class,'addview'])->name('add_doctor');

Route::post('/upload_doctor',[\App\Http\Controllers\AdminController::class,'uploadDoctor']);

Route::get('/home',[\App\Http\Controllers\HomeController::class,'redirect']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/appointment',[\App\Http\Controllers\HomeController::class,'appointment']);

Route::get('/my-appointment',[\App\Http\Controllers\HomeController::class,'myAppointment']);

Route::post('/cancel-appointment',[\App\Http\Controllers\HomeController::class,'cancelAppointment']);

Route::get('/show-appointment',[\App\Http\Controllers\AdminController::class,'showAppointment']);

Route::get('/approve/{id}',[\App\Http\Controllers\AdminController::class,'approveAppointment']);

Route::get('/cancel/{id}',[\App\Http\Controllers\AdminController::class,'cancelAppointment']);





