<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ChildcategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdvertisementController;
use App\Models\Category;
use Illuminate\Support\Facades\View;

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

Route::get('/home', function () {
    return view('home');
});

Route::get('/auth', function () {
    return view('backend.admin.index');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

// admin
Route::group(['prefix' => 'auth'], function () {
    Route::resource('/category', CategoryController::class);
    Route::resource('/subcategory', SubcategoryController::class);
    Route::resource('/childcategory', ChildcategoryController::class);
});

Route::get('/', [MenuController::class, 'menu']);

// ads
Route::get('/ads/create', [AdvertisementController::class, 'create'])->name('ads.create')->middleware('auth');
Route::post('/ads/store', [AdvertisementController::class, 'store'])->name('ads.store')->middleware('auth');
Route::get('/ads', [AdvertisementController::class, 'index'])->name('ads.index')->middleware('auth');
Route::get('/ads/edit/{id}', [AdvertisementController::class, 'edit'])->name('ads.edit')->middleware('auth');
Route::put('/ads/update/{id}', [AdvertisementController::class, 'update'])->name('ads.update')->middleware('auth');
