<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DatabaseController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\UserMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
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


Route::any('/', [HomeController::class, 'index'])->name('login');

Auth::routes();


Route::prefix('user')->middleware('user')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('client.home');

    Route::any('/campaign', [UserController::class, 'campaign'])->name('user.campaign');
    Route::any('/sms/area', [UserController::class, 'sms_area'])->name('sms.area');
    Route::any('/sms/send', [UserController::class, 'store'])->name('sms.store');

});

Route::prefix('admin')->middleware('admin')->group(function(){

    

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/user', [AdminDashboardController::class, 'user'])->name('admin.user');
    Route::any('/user/add', [AdminDashboardController::class, 'add_user'])->name('add.user');
    Route::any('/user/store', [AdminDashboardController::class, 'user_store'])->name('user.store');
    Route::any('/user/update', [AdminDashboardController::class, 'user_update'])->name('user.update');

    Route::any('/send', [MessageController::class, 'index'])->name('msg.send');
    Route::any('/send/store', [MessageController::class, 'store'])->name('msg.store');

    Route::any('/database', [DatabaseController::class, 'index'])->name('database');
    Route::any('/database/add', [DatabaseController::class, 'add_data'])->name('database.add');
    Route::any('/database/store', [DatabaseController::class, 'store'])->name('database.store');
    Route::any('/database/edit/{id}', [DatabaseController::class, 'edit'])->name('database.edit');
    Route::any('/database/update/{id}', [DatabaseController::class, 'update'])->name('database.update');
    Route::any('/database/delete/{id}', [DatabaseController::class, 'delete'])->name('database.delete');

    Route::any('/message/requests',[UserMessageController::class, 'list'])->name('user.message.list');
    Route::any('/message/processing/{id}/{status}',[UserMessageController::class, 'action'])->name('user.message.action');

    Route::any('/message/view/{id}', [UserMessageController::class, 'msg_view'] )->name('msg.view');

    
});
