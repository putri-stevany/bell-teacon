<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\BalikController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Sesi2Controller;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\UjianController;
use App\Models\Schedule;
use Illuminate\Http\Request;
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
Route::post('/ujian', [UjianController::class, 'store'])->name("ujian");
Route::put('/ujian/{ujian}', [UjianController::class, 'update'])->name('ujian.update');
Route::delete('/ujian/{ujian}', [UjianController::class, 'destroy'])->name("ujian.destroy");

Route::get('/sesi2', [Sesi2Controller::class, 'index'])->name("sesi2");
Route::post('/sesi2', [Sesi2Controller::class, 'store'])->name("sesi2");
Route::put('/sesi2/{sesi2}', [Sesi2Controller::class, 'update'])->name('sesi2.update');
Route::delete('/sesi2/{sesi2}', [Sesi2Controller::class, 'destroy'])->name("sesi2.destroy");

Route::get('/balik', [BalikController::class, 'index'])->name("balik");
Route::post('/balik', [BalikController::class, 'store'])->name("balik");
Route::put('/balik/{balik}', [BalikController::class, 'update'])->name('balik.update');
Route::delete('/balik/{balik}', [BalikController::class, 'destroy'])->name("balik.destroy");

Route::get('/get-all-schedules', function (Request $request) {
    $schedules = Schedule::all();

    return response()->json($schedules);
});

Route::get('/get-audio-schedule', [AudioController::class, 'getAudioSchedule']);







