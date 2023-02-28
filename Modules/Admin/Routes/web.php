<?php

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

use Illuminate\Support\Facades\Route;

Route::prefix('authenticate')->group(function() {
    Route::get('/login', 'AdminAuthController@getLogin')->name('admin.login');
    Route::post('/login', 'AdminAuthController@postLogin');
    Route::get('dang-xuat', 'AdminAuthController@getLogout')->name('get.logout.admin');
});
Route::prefix('admin')->middleware('CheckLoginAdmin')->group(function() {


    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/info','AdminController@indexAdmin')->name('admin.get.list.admin');
    Route::get('/update','AdminController@edit')->name('admin.get.edit.admin');
    Route::post('/update','AdminController@update');
    Route::group(['prefix' => 'category'],function (){
        Route::get('/','AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/create','AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/create','AdminCategoryController@store');
        Route::get('/update/{id}','AdminCategoryController@edit');
        Route::post('/update/{id}','AdminCategoryController@update');
        Route::get('/active/{id}','AdminCategoryController@action')->name('admin.get.action.category');

        Route::DELETE('destroy','AdminCategoryController@destroy');
    });

    Route::group(['prefix' => 'icon'],function (){
        Route::get('/','AdminIconConttrollerController@index')->name('admin.get.list.icon');
        Route::get('/create','AdminIconConttrollerController@create')->name('admin.get.create.icon');
        Route::post('/create','AdminIconConttrollerController@store');
        Route::get('/update/{id}','AdminIconConttrollerController@edit')->name('admin.get.edit.icon');
        Route::post('/update/{id}','AdminIconConttrollerController@update');
        Route::get('/{action}/{id}','AdminIconConttrollerController@action')->name('admin.get.action.icon');
    });

    Route::group(['prefix' => 'slider'],function (){
        Route::get('/','AdminSliderController@index')->name('admin.get.list.slider');
        Route::get('/create','AdminSliderController@create')->name('admin.get.create.slider');
        Route::get('/update/{id}','AdminSliderController@edit')->name('admin.get.edit.slider');
        Route::post('/update/{id}','AdminSliderController@update');
        Route::get('/{action}/{id}','AdminSliderController@action')->name('admin.get.action.slider');
    });

    Route::group(['prefix' => 'product'],function (){
        Route::get('/','AdminProductController@index')->name('admin.get.list.product');
        Route::get('/create','AdminProductController@create')->name('admin.get.create.product');
        Route::post('/create','AdminProductController@store');
        Route::get('/update/{id}','AdminProductController@edit')->name('admin.get.edit.product');
        Route::post('/update/{id}','AdminProductController@update');
        Route::get('/{action}/{id}','AdminProductController@action')->name('admin.get.action.product');
    });

    //bai viet
    Route::group(['prefix' => 'article'],function (){
        Route::get('/','AdminArticleController@index')->name('admin.get.list.article');
        Route::get('/create','AdminArticleController@create')->name('admin.get.create.article');
        Route::post('/create','AdminArticleController@store');
        Route::get('/update/{id}','AdminArticleController@edit')->name('admin.get.edit.article');
        Route::post('/update/{id}','AdminArticleController@update');
        Route::get('/{action}/{id}','AdminArticleController@action')->name('admin.get.action.article');
    });

    //kho hang
    Route::group(['prefix' =>'warehouse'],function (){
        Route::get('/',[\Modules\Admin\Http\Controllers\AdminWareHouseController::class,'getWarehouseProduct'])->name('admin.get.warehouse.list');
    });

    // quan ly don hang
    Route::group(['prefix' => 'transaction'],function (){
        Route::get('/','AdminTransactionController@index')->name('admin.get.list.transaction');
        Route::get('/view/{id}','AdminTransactionController@viewOrder')->name('admin.get.view.order');
        Route::get('/active/{id}','AdminTransactionController@actionTransaction')->name('admin.get.active.transaction');
        Route::get('/delete/{id}','AdminTransactionController@delete')->name('admin.get.delete.transaction');
    });

    Route::group(['prefix' => 'user'],function (){
        Route::get('/','AdminUserController@index')->name('admin.get.list.user');
        Route::get('/{action}/{id}','AdminUserController@action')->name('admin.get.action.user');
    });

    Route::group(['prefix' => 'rating'],function (){
        Route::get('/','AdminRatingController@index')->name('admin.get.list.rating');
        Route::get('/delete/{id}','AdminRatingController@delete')->name('admin.get.delete.rating');
    });

    Route::group(['prefix' => 'contact'],function (){
        Route::get('/','AdminContactController@index')->name('admin.get.list.contact');
        Route::get('/update/{id}','AdminContactController@update')->name('admin.update.contact');
    });
});
