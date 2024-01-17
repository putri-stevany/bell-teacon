<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\UjianController;
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

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/tipe', [TipeController::class, 'index'])->name("tipe");

Route::get('/normal', [ScheduleController::class, 'index'])->name("normal");
Route::post('/normal', [ScheduleController::class, 'store'])->name("normal");
Route::put('/schedule/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update');
Route::delete('/schedule/{schedule}', [ScheduleController::class, 'destroy'])->name("schedule.destroy");

Route::get('/ujian', [UjianController::class, 'index'])->name("ujian");





