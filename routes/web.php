<?php

use App\Models\Absensi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbsensiController;
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

Route::get('/dashboard', function () {
    $user_name = auth()->user()->name;

    return view('dashboard.index', [
        "title" => "Dashboard",
        'active' => 'dashboard',
        'absensis' => Absensi::all(),
        'absensi_by_name' => Absensi::where('name', $user_name)->get(),
    ]);
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/dashboard/absensi', AbsensiController::class)->except(['update', 'edit'])->middleware('auth');
Route::get('/dashboard/{absensi:id}/edit', [AbsensiController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/{absensi:id}', [AbsensiController::class, 'update'])->middleware('auth');

Route::resource('/dashboard/profile', ProfileController::class)->except(['update', 'edit'])->middleware('auth');
Route::get('/dashboard/profile/{user:id}/edit', [ProfileController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/profile/{user:id}', [ProfileController::class, 'update'])->middleware('auth');

Route::resource('/dashboard/employees', UserController::class)->except(['show', 'edit', 'update', 'destroy'])->middleware('auth');
Route::get('/dashboard/employees/{user:id}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/employees/{user:id}', [UserController::class, 'update'])->middleware('auth');
Route::get('/dashboard/employees/add', [UserController::class, 'show'])->middleware('auth');
Route::delete('/dashboard/employees/{user:id}', [UserController::class, 'destroy'])->middleware('auth');

Route::resource('/dashboard/divisions', DivisionController::class)->except(['edit', 'update', 'destroy'])->middleware('auth');
Route::get('/dashboard/divisions/{division:id}/edit', [DivisionController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/divisions/{division:id}', [DivisionController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/divisions/{division:id}', [DivisionController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/reports', function () {
    $user_name = auth()->user()->name;

    return view('dashboard.reports.index', [
        "title" => "Dashboard | Reports",
        'active' => 'dashboard',
        'absensis' => Absensi::all(),
        'absensi_by_name' => Absensi::where('name', $user_name)->get(),
    ]);
})->middleware('auth');

