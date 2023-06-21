<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\TalentController;
use App\Http\Controllers\JobController;

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

Route::get('/', [IndexController::class, 'index']);
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [IndexController::class, 'show']);

Route::get('login', [AuthController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('login.destroy');

Route::resource('user-account', UserAccountController::class)->only(['create', 'store'])->middleware('guest');

Route::get('/talents', [TalentController::class, 'index'])->name('talents.index');
Route::get('/talents/{talent}', [TalentController::class, 'show']);

// Admin dashboard
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('auth');