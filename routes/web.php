<?php

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
// ============= Route Test Phỏng Vấn=============
Route::get('cau2', [\App\Http\Controllers\PageController::class, 'Cau_Hoi_2']);
Route::get('cau3', [\App\Http\Controllers\PageController::class, 'Cau_Hoi_3']);

// ================== Route API ==================
Route::get('product/{id}', [\App\Http\Controllers\PageController::class, 'getProductDetail']);


// ===============================================
Route::get('fashi', [\App\Http\Controllers\PageController::class, 'index'])->name('fashi');
Route::get('', function (){
    return redirect()->route('fashi');
});
Route::post('fashi', [\App\Http\Controllers\PageController::class, 'searchProduct'])->name('searchProduct');


// Route Auth customer
Route::middleware('checkLogin:customer')->group(function () {
    // Login Route
    Route::get('sign-in', [\App\Http\Controllers\CustomerController::class, 'getSignIn'])->name('customer.getSignIn');
    Route::post('sign-in', [\App\Http\Controllers\CustomerController::class, 'postSignIn'])->name('customer.postSignIn');
    // Registration Route
    Route::get('sign-up', [\App\Http\Controllers\CustomerController::class, 'getSignUp'])->name('customer.getSignUp');
    Route::post('sign-up', [\App\Http\Controllers\CustomerController::class, 'postSignUp'])->name('customer.postSignUp');
});

Route::middleware(['checkRole:customer'])->group(function () {
    Route::get('/me/purchase', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customer.my-page');
    Route::get('/me/profile/{id}', [\App\Http\Controllers\CustomerController::class, 'profile'])->name('customer.profile');
    Route::get('/ajax-get-purchase/{slug}', [\App\Http\Controllers\CustomerController::class, 'getPurchase'])->name('getPurchase');
    Route::post('/me/update-profile/{id}', [\App\Http\Controllers\CustomerController::class, 'updateProfile'])->name('customer.updateProfile');

    Route::get('/me/send-otp', [\App\Http\Controllers\CustomerController::class, 'showForm'])->name('customer.showForm');
    Route::post('/me/send-otp', [\App\Http\Controllers\CustomerController::class, 'sendOtp'])->name('customer.sendOtp');
    Route::post('/me/verify-otp', [\App\Http\Controllers\CustomerController::class, 'verifyOtp'])->name('customer.verifyOtp');

    Route::get('/me/change-password', [\App\Http\Controllers\CustomerController::class, 'changePassword'])->name('customer.changePassword');

    Route::get('cart', [\App\Http\Controllers\CartController::class,'index'])->name('listCart');
    Route::get('/remove-item-list-cart/{id}', [\App\Http\Controllers\CartController::class,'removeItemListCart'])->name('removeItemListCart');
    Route::get('/update-item-list-cart/{id}/{quantity}', [\App\Http\Controllers\CartController::class,'updateItemListCart'])->name('updateItemListCart');

    Route::get('/favorite-product', [\App\Http\Controllers\PageController::class,'getListFavoriteProduct'])->name('listFavoriteProduct');
    Route::get('/remove-favorite-item/{id}', [\App\Http\Controllers\PageController::class,'removeFavoriteItem'])->name('removeFavoriteItem');

    // Route process buy
    Route::post('/get-zip-code', [\App\Http\Controllers\OrderController::class,'getZipCode'])->name('getZipCode');
    Route::get('/cart-confirm', [\App\Http\Controllers\OrderController::class,'confirm'])->name('order.confirm');
    Route::post('/process', [\App\Http\Controllers\OrderController::class,'processBuy'])->name('order.process_buy');

    Route::get('logout', [\App\Http\Controllers\CustomerController::class, 'logout'])->name('customer.logout');
});

Route::get('/add-cart/{id}', [\App\Http\Controllers\CartController::class,'addCart'])->name('addCart');
Route::get('/remove-item/{id}', [\App\Http\Controllers\CartController::class,'removeItemCart'])->name('removeItemCart');

// Route Categories
Route::get('/category/{name}', [\App\Http\Controllers\ProductController::class, 'getProductByCategory'])->name('category.slug');
Route::get('/change-favorite-item/{id}', [\App\Http\Controllers\PageController::class,'changeFavoriteItem'])->name('changeFavoriteItem');
