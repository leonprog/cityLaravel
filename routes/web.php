<?php

use Illuminate\Support\Facades\Route;
use App\Models\City;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\CityMiddleware;

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
Route::get('/{slug?}', [IndexController::class, 'index'])->middleware(CityMiddleware::class)->name('home');