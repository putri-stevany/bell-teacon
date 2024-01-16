<?php

use App\Http\Controllers\FridayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MondayController;
use App\Http\Controllers\NormalController;
use App\Http\Controllers\ThursdayController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\TuesdayController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\WednesdayController;
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
Route::get('/normal', [NormalController::class, 'index'])->name("normal");
Route::get('/ujian', [UjianController::class, 'index'])->name("ujian");
Route::resource('/monday', MondayController::class);
Route::resource('/tuesday', TuesdayController::class);
Route::resource('/wednesday', WednesdayController::class);
Route::resource('/thursday', ThursdayController::class);
Route::resource('/friday', FridayController::class);




