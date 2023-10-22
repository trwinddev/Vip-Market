<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ChildcategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
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
    Route::get('/allads', 'AdminListingController@index')->name('all.ads');
});

Route::get('/', [MenuController::class, 'menu']);

// ads
Route::get('/ads/create', [AdvertisementController::class, 'create'])->name('ads.create')->middleware('auth');
Route::post('/ads/store', [AdvertisementController::class, 'store'])->name('ads.store')->middleware('auth');
Route::get('/ads', [AdvertisementController::class, 'index'])->name('ads.index')->middleware('auth');
Route::get('/ads/edit/{id}', [AdvertisementController::class, 'edit'])->name('ads.edit')->middleware('auth');
Route::put('/ads/update/{id}', [AdvertisementController::class, 'update'])->name('ads.update')->middleware('auth');

//profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');

//frontend
Route::get(
    '/product/{categorySlug}',
    [FrontendController::class, 'findBasedOnCategory']
)->name('category.show');

//Message
Route::post('/send/message', 'SendMessageController@store')->middleware('auth');
Route::get('messages', 'SendMessageController@index')->name('messages')->middleware('auth');
Route::get('/users', 'SendMessageController@chatWithThisUser');
Route::get('/message/user/{id}', 'SendMessageController@showMessages');
Route::post('/start-conversation', 'SendMessageController@startConversation');

//Save ad
Route::post('/ad/save', 'SaveAdController@saveAd');
Route::post('/ad/remove', 'SaveAdController@removeAd')->name('ad.remove');
Route::get('/saved-ads', 'SaveAdController@getMyads')->name('saved.ad');
