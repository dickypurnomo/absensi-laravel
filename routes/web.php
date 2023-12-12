<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\UserController;

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
    return view('pages.home.index', [
        "title" => "Home",
        'active' => 'home'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/reports', [DashboardController::class, 'reports'])->middleware('auth');
Route::resource('/dashboard/absensi', AbsensiController::class)->middleware('auth');
Route::resource('/dashboard/divisions', DivisionController::class)->middleware('admin');
Route::resource('/dashboard/profile', ProfileController::class, ['parameters' => ['profile' => 'user',]])->middleware('auth');
Route::resource('/dashboard/employees', UserController::class, ['parameters' => ['employees' => 'user',]])->middleware('admin');
