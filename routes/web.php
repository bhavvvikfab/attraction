<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AttractionController;
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