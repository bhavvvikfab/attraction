<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ChatController;
use App\Http\Middleware\Auther;
use Illuminate\Support\Facades\Auth;


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

// route's for ADMIN start
Route::prefix('admin')->middleware([Auther::class])->group(function (){
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::post('/loginporcess', [LoginController::class, 'login']);
    Route::post('/register', [LoginController::class, 'register']);
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/register', [LoginController::class, 'register_page']);
    Route::get('/admin_profile', [LoginController::class, 'admin_profile']);

    Route::get('/', function () {
        $data['authUser'] = Auth::user();
        return view('index',$data);
    })->name('admin');
    Route::get('/all_attraction', [AttractionController::class, 'index']);
    Route::get('/view_attraction', [AttractionController::class, 'view_attraction']);
});
// route's for ADMIN end

// route's for AGENT start
Route::prefix('agent')->middleware([Auther::class])->group(function (){
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::post('/loginporcess', [LoginController::class, 'login']);
    Route::post('/register', [LoginController::class, 'register']);
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/register', [LoginController::class, 'register_page']);
    Route::get('/admin_profile', [LoginController::class, 'admin_profile']);
    
    Route::get('/', function () {
        $data['authUser'] = Auth::user();

        return view('index');
    })->name('agent');

    Route::get('/all_attraction', [AttractionController::class, 'index']);
    Route::get('/view_attraction', [AttractionController::class, 'view_attraction']);
});
// route's for AGENT end

Route::get('/all_attraction', [AttractionController::class, 'index']);
Route::get('/view_attraction', [AttractionController::class, 'view_attraction']);

Route::get('/all_booking', [BookingController::class, 'index']);

Route::get('/all_agent', [AgentController::class, 'index']);
Route::get('/add_agent', [AgentController::class, 'add_agent']);
Route::get('/view_agent', [AgentController::class, 'view_agent']);


Route::get('/topup', [TopupController::class, 'index']);

Route::get('/admin_invoice', [InvoiceController::class, 'index']);
Route::get('/view_single_invoice', [InvoiceController::class, 'view_single_invoice']);


Route::get('/all_chat', [ChatController::class, 'index']);
Route::get('/view_chat', [ChatController::class, 'view_chat']);
