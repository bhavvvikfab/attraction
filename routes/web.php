<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\TopupController;
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

Route::get('/welcome', function () {
    return view('index');
});
Route::get('/', [LoginController::class, 'index']);
Route::get('/register', [LoginController::class, 'register_page']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);


Route::get('/all_attraction', [AttractionController::class, 'index']);
Route::get('/view_attraction', [AttractionController::class, 'view_attraction']);

Route::get('/all_booking', [BookingController::class, 'index']);

Route::get('/all_agent', [AgentController::class, 'index']);
Route::get('/add_agent', [AgentController::class, 'add_agent']);
Route::get('/view_agent', [AgentController::class, 'view_agent']);
Route::get('/topup', [TopupController::class, 'index']);
