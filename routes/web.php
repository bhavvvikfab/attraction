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
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api_credentialController;
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
Route::get('/', function(){ return redirect('/agent'); });

// route's for ADMIN start
Route::prefix('admin')->middleware([Auther::class])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::post('/loginporcess', [LoginController::class, 'login'])->defaults('prefix', 'admin');
    Route::post('/register', [LoginController::class, 'register']);
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/register', [LoginController::class, 'register_page']);
    Route::get('/profile', [LoginController::class, 'profile'])->name('admin.profile');
    Route::post('/update_profile', [LoginController::class, 'update_profile'])->name('admin.update_profile');
    Route::post('/change_password', [LoginController::class, 'change_password'])->name('admin.change_password');
    // Route::get('/setting', [LoginController::class, 'setting'])->name('admin.setting');

     
    Route::get('/', [LoginController::class,'deshborad_page'])->name('admin');
    Route::get('/all_attraction', [AttractionController::class, 'index'])->name('admin.all_attraction');
    Route::get('/view_attraction', [AttractionController::class, 'view_attraction'])->name('admin.view_attraction');
    Route::get('/add_attraction', [AttractionController::class, 'add_attraction'])->name('admin.add_attraction');
    Route::get('/view_single_attraction/{id}', [AttractionController::class, 'view_single_attraction'])->name('admin.view_single_attraction');

    Route::get('/all_booking', [BookingController::class, 'index'])->name('admin.all_booking');

    Route::get('/all_agent', [AgentController::class, 'index'])->name('admin.all_agent');
    Route::get('/add_agent', [AgentController::class, 'add_agent'])->name('admin.add_agent');
    Route::get('/view_agent', [AgentController::class, 'view_agent'])->name('admin.view_agent');
    Route::post('/storeAgent', [AgentController::class, 'store'])->name('admin.storeAgent');
    Route::get("/editagent/{id}", [AgentController::class, 'editagent'])->name('admin.editagent');
    Route::post("/updateAgent", [AgentController::class, 'updateAgent'])->name('admin.updateAgent');
    Route::post("/deleteagent", [AgentController::class, 'deleteagent'])->name('admin.deleteagent');
    Route::get("/viewagent/{id}", [AgentController::class, 'viewagent'])->name('admin.viewagent');
    Route::post("/agent_status_change", [AgentController::class, 'agent_status_change'])->name('admin.agent_status_change');


    Route::get('/topup', [TopupController::class, 'index'])->name('admin.topup');
    Route::post('/update-topup-status', [TopupController::class, 'updateTopUpStatus']);

    Route::get('/admin_invoice', [InvoiceController::class, 'index'])->name('admin.admin_invoice');
    Route::get('/view_single_invoice', [InvoiceController::class, 'view_single_invoice'])->name('admin.view_single_invoice');


    Route::get('/all_chat', [ChatController::class, 'index'])->name('admin.all_chat');
    Route::get('/view_chat', [ChatController::class, 'view_chat'])->name('admin.view_chat'); 

    Route::post('/update_credential', [Api_credentialController::class, 'index'])->name('admin.update_credential');

    Route::post('/update_markup', [SettingController::class, 'update_markup'])->name('admin.update_markup');
    Route::get('/setting', [SettingController::class, 'setting'])->name('admin.setting');
    Route::post('/update_attraction_markup', [SettingController::class, 'update_attraction_markup'])->name('admin.update_attraction_markup');

});
// route's for ADMIN end

// route's for AGENT start
Route::prefix('agent')->middleware([Auther::class])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('agent.logout');
    Route::post('/loginporcess', [LoginController::class, 'login'])->defaults('prefix', 'agent');
    Route::post('/register', [LoginController::class, 'register'])->name('agent.register');
    Route::get('/login', [LoginController::class, 'index'])->name('agent.login');
    Route::get('/register', [LoginController::class, 'register_page'])->name('agent.register');
    Route::get('/profile', [LoginController::class, 'profile'])->name('agent.profile');
    Route::post('/update_profile', [LoginController::class, 'update_profile'])->name('agent.update_profile');
    Route::post('/change_password', [LoginController::class, 'change_password'])->name('agent.change_password');

    // Route::get('/', function () {
    //     $data['authUser'] = Auth::user();

    //     return view('index');
    // })->name('agent');
    Route::get('/', [LoginController::class,'deshborad_page'])->name('agent');

    Route::get('/all_attraction', [AttractionController::class, 'index'])->name('agent.all_attraction');
    Route::get('/view_attraction', [AttractionController::class, 'view_attraction'])->name('agent.view_attraction');
    // Route::get('/view_attraction_search', [AttractionController::class, 'view_attraction'])->name('agent.view_attraction.search');
    Route::get('/view_single_attraction/{id}', [AttractionController::class, 'view_single_attraction'])->name('agent.view_single_attraction');

    Route::get('/topup', [TopupController::class, 'index'])->name('agent.topup');
    Route::post('/request-topup', [TopupController::class, 'requestTopUp']);

    Route::get('/all_booking', [BookingController::class, 'index'])->name('agent.all_booking');

    Route::get('/all_agent', [AttractionController::class, 'view_attraction'])->name('agent.all_agent');
    Route::get('/add_agent', [AttractionController::class, 'view_attraction'])->name('agent.add_agent');

    Route::get('/admin_invoice', [AttractionController::class, 'view_attraction'])->name('agent.admin_invoice');
    
    Route::get('/all_chat', [AttractionController::class, 'view_attraction'])->name('agent.all_chat');
    

});
// route's for AGENT end

Route::resource('products', ProductController::class);

