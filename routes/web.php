<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Controllers\Middleware;

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

Route::name('user_capabilities.')->group(function () {
    Route::get('/', [MainController::class, 'main'])->name('index');
    Route::get('/lessor', [MainController::class, 'lessor'])->name('lessor');
    Route::get('/tenant', [MainController::class, 'tenant'])->name('tenant');
    Route::get('/category/{category_id}', [MainController::class, 'category'])->whereNumber('category_id')->name('category');
    Route::get('/category/{category_id}/sorting/{sort}', [MainController::class, 'getSorting'])->whereIn('sort', ['created_at', 'price', 'price_asc'])->name('sorting');
    Route::get('/category/item/{item_id}', [MainController::class, 'item'])->whereNumber('item_id')->name('item');
    
    Route::middleware(['guest'])->group(function() {
        Route::post('/register', [UserController::class, 'register'])->name('register');
        Route::post('/login', [UserController::class, 'login'])->name('login');
    });
    
    Route::middleware(['auth'])->group(function() {
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::get('/profile/list_of_tenants', [UserController::class, 'list_of_tenants'])->name('list_of_tenants');
        Route::get('/profile/my_rent', [UserController::class, 'my_rent'])->name('my_rent');
        Route::get('/profile/active_rental', [UserController::class, 'active_rental'])->name('active_rental');
        Route::get('/profile/сompleted_lease', [UserController::class, 'сompleted_lease'])->name('сompleted_lease');
        Route::get('/profile/profile_management', [UserController::class, 'profile_management'])->name('profile_management');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/profile/deleteItem/{id}', [UserController::class, 'deleteItem'])->name('deleteItem');
        Route::get('/profile/changeStatus/{id}', [UserController::class, 'changeStatus'])->name('changeStatus');

        Route::post('/rental/{item}', [UserController::class, 'rental'])->whereNumber('item')->name('rental');
        Route::post('/profile/create_ad', [UserController::class, 'create_ad'])->name('create_ad');
    });
    
});

// Route::name('registered_user.')->group(function () {
    
    // });
    
    Route::name('admin.')->group(function () {
        Route::get('/control_panel', [AdminController::class, 'control_panel'])->name('control_panel');
        Route::get('/control_panel/ads', [AdminController::class, 'ads'])->name('ads');
        Route::get('/control_panel/lease_transaction', [AdminController::class, 'lease_transaction'])->name('lease_transaction');
        Route::get('/control_panel/controversial_situations', [AdminController::class, 'controversial_situations'])->name('controversial_situations');
    });
