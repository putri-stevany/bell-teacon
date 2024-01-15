<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MondayController;
use App\Http\Controllers\TuesdayController;
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

Route::get('/tuesday', [TuesdayController::class, 'index'])->name("tuesday");
Route::post('/tuesday', [TuesdayController::class, 'store'])->name("tuesdayy");

Route::resource('/monday', MondayController::class);
Route::resource('/tuesday', TuesdayController::class);



