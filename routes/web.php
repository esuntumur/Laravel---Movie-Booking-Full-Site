<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\shopController;
//  sda
Route::post('auth/save', [MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [MainController::class, 'logOut'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
    //Shop--------------------------------
    Route::get('/shop/dashboard', [shopController::class, 'dashboardShop'])->name('shop.dashboard');
    Route::get('/shop/addContent', [shopController::class, 'searchForm'])->name('shop.addContent');
    Route::get('/shop/addContent/{id}', [shopController::class, 'addContent']);
    Route::post('/shop/addContent/{id}', [shopController::class, 'doAddContent']);
    Route::get('/shop/createContent', [shopController::class, 'createContent'])->name('shop.createContent');
    Route::post('/shop/createContent', [shopController::class, 'doCreateContent']);
    Route::get('/shop/myContent', [shopController::class, 'myContent'])->name('shop.myContent');
    Route::get('/shop/addContent', [shopController::class, 'searchForm'])->name('shop.addContent');
    Route::get('/shop/search', [shopController::class, 'searchContent'])->name('shop.search');
    //Customer------------------------------------------------
    Route::get('/customer/dashboard', [MainController::class, 'dashboardCustomer'])->name('customer.dashboard');
    Route::get('/customer/home', [MainController::class, 'dashboardHome'])->name('customer.home');
    Route::get('/customer/search', [MainController::class, 'searchContent'])->name('content.search');
    Route::get('/customer/content/{id}', [MainController::class, 'getContent']);
    // Route::get('/customer/content/{id}', [MainController::class, 'orderContent']);
    //Auth-----------------------------------------------------------------------------
    Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
    Route::get('/admin/dashboard', [MainController::class, 'dashboardAdmin']);
});
