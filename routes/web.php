<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

//Route::get('/', function () {
//    return view('welcome');
//});



Route::group(['namespace' => 'Auth'], function () {
    Route::get('dang-ky', [RegisterController::class, 'getRegister'])->name('get.register');
    Route::post('dang-ky', [RegisterController::class, 'postRegister']);

    Route::get('xac-nhan-tai-khoan', [RegisterController::class, 'verifyAccount'])->name('user.verify.account');

    Route::get('dang-nhap', [LoginController::class, 'getLogin'])->name('get.login');
    Route::post('dang-nhap', [LoginController::class, 'postLogin'])->name('post.login');
    Route::get('dang-xuat', [LoginController::class, 'getLogout'])->name('post.logout.user');

    Route::get('lay-lai-mat-khau', [ForgotPasswordController::class, 'getFormResetPassword'])->name('password.email');
    Route::post('lay-lai-mat-khau', [ForgotPasswordController::class, 'sendCodeResetPassword']);
    Route::get('/password/reset', [ForgotPasswordController::class, 'resetPassword'])->name('get.link.reset.password');
    Route::post('/password/reset', [ForgotPasswordController::class, 'saveResetPassword']);

});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('danh-muc/{slug}-{id}', 'App\Http\Controllers\CategoryController@getListProduct')->name('get.list.product');
Route::get('san-pham', 'App\Http\Controllers\CategoryController@getListProduct')->name('get.product.list');
Route::get('san-pham/{slug}-{id}', 'App\Http\Controllers\ProductDetailController@productDetail')->name('get.detail.product');

// bai viet
Route::get('bai-viet', 'App\Http\Controllers\ArticleController@getListArticle')->name('get.list.article');
Route::get('bai-viet/{slug}-{id}', 'App\Http\Controllers\ArticleController@getDetailArticle')->name('get.detail.article');


Route::prefix('shopping')->group(function () {

    Route::get('/add/{id}', [\App\Http\Controllers\ShoppingCartController::class, 'addProduct'])->name('add.shopping.cart');
    Route::get('/delete/{id}', [\App\Http\Controllers\ShoppingCartController::class, 'deleteProductItem'])->name('delete.shopping.cart');
    Route::get('/danhsach', [\App\Http\Controllers\ShoppingCartController::class, 'getListShoppingCart'])->name('get.list.shopping.cart');
});

//Route::middleware(['CheckLoginUser'])->group(function () {
//    Route::prefix('gio-hang')->group(function () {
//        Route::get('/thanh-toan',[\App\Http\Controllers\ShoppingCartController::class,'getFormPay'])->name('get.form.pay');
//    });
//});
Route::group(['prefix' => 'gio-hang', 'middleware' => 'CheckLoginUser'], function () {
    Route::get('/thanh-toan', [\App\Http\Controllers\ShoppingCartController::class, 'getFormPay'])->name('get.form.pay');
    Route::post('/thanh-toan', [\App\Http\Controllers\ShoppingCartController::class, 'saveInfoShoppingCart']);
});

Route::group(['prefix' => 'ajax', 'middleware' => 'CheckLoginUser'], function () {
    Route::post('/danh-gia/{id}', [\App\Http\Controllers\RatingController::class, 'saveRating'])->name('post.rating.product');
});

Route::group(['prefix' => 'ajax'], function () {
    Route::post('/vew-product', [\App\Http\Controllers\HomeController::class, 'renderProductView'])->name('post.product.view');
});

Route::get('ve-chung-toi', [\App\Http\Controllers\PageStaticController::class, 'aboutUs'])->name('get.about_us');
Route::get('bao-hanh', [\App\Http\Controllers\PageStaticController::class, 'insurance'])->name('get.insurance');
Route::get('giao-hang', [\App\Http\Controllers\PageStaticController::class, 'delivery'])->name('get.delivery');

Route::get('lien-he', [\App\Http\Controllers\ContacController::class, 'getContact'])->name('get.contact');
Route::post('lien-he', [\App\Http\Controllers\ContacController::class, 'saveContact']);

Route::group(['prefix' => 'user', 'middleware' => 'CheckLoginUser'], function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('user.dashboard');

    Route::get('/info',[\App\Http\Controllers\UserController::class, 'indexInfomation'])->name('user.get.list');
    Route::get('/update', [\App\Http\Controllers\UserController::class, 'updateInfo'])->name('user.update.info');
    Route::post('/update', [\App\Http\Controllers\UserController::class, 'saveUpdateInfo']);

    Route::get('/password', [\App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.update.password');
    Route::post('/password', [\App\Http\Controllers\UserController::class, 'saveUpdatePassword']);

    Route::get('/san-pham-quan-tam', [\App\Http\Controllers\UserController::class, 'getProductCare'])->name('user.list.product_care');
    Route::get('/san-pham-ban-chay', [\App\Http\Controllers\UserController::class, 'getProductPay'])->name('user.list.product');
});
