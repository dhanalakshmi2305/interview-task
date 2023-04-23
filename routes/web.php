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

Route::get('/', function () {return view('welcome');});

use App\Http\Controllers\BookingController;
Route::get('/booking', [BookingController::class, 'booking']);
Route::get('/', [BookingController::class, 'bookSeats']);
Route::get('/bookSeats', [BookingController::class, 'bookSeats']);
Route::post('/bookSeats', [BookingController::class, 'bookSeats']);

