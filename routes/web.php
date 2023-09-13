<?php

use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\Category\CategoryIndex;
use App\Http\Livewire\Admin\Category\CategoryManage;
use App\Http\Livewire\Admin\Product\ProductIndex;
use App\Http\Livewire\Admin\Product\ProductManage;
use App\Http\Livewire\User\UserDashboard;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::group(['middleware' => 'user'], function () {
    Route::get('/', UserDashboard::class)->name('userDashboard');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', AdminDashboard::class)->name('adminDashboard');
    Route::get('/index-product', ProductIndex::class);
    Route::get('/manage-product', ProductManage::class);
    Route::get('/index-category', CategoryIndex::class)->name('index-category');
    Route::get('/manage-category', CategoryManage::class);
});