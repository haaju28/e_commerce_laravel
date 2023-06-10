<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\ArticleCategoriesController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebInformationController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Client\AboutWebController;
use App\Http\Controllers\Client\BlogClientController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Client\WishlistController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\VnpayController;
use Illuminate\Support\Facades\Route;
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
// ------------------Client---------------//
// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/search', [ShopController::class, 'search'])->name('shop.search');

// Blog
Route::get('/blog', [BlogClientController::class,'index'])->name('blog');
Route::get('/blog/search', [BlogClientController::class, 'searchBlog'])->name('blog.search');
Route::get('/blog/{slug}', [BlogClientController::class, 'getDetailBySlug'])->name('blog.detail');


// About
Route::get('/about', [AboutWebController::class, 'index'])->name('about');

// Contact
Route::resource('contact', ContactController::class);

// Cart
include_once(__DIR__ . '/cart/web.php');

// Product detail
Route::get('/product/{slug}', [HomeController::class, 'getDetailBySlug'])->name('product.detail');

// Checkout
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/checkout/place-order', [OrderController::class, 'placeOrder'])->name('checkout.place-order')->middleware('auth');

// VNpay
Route::get('/vnpay/callback', [VnpayController::class, 'callbackVnpay'])->name('vnpay.callback')->middleware('auth');
Route::get('/user/order/{id}', [OrderController::class, 'getDetailOrderByCode'])->name('user.order.code')->middleware('auth');

// Wishlist
Route::resource('wishlist',WishlistController::class)->middleware('auth');
Route::get('wishlist/add-product/{id}' ,[WishlistController::class, 'addToWishlist'])->name('wishlist.add')->middleware('auth');

// Profile
Route::get('/profile/{id}',[UserController::class, 'showProfile'])->name('user.profile')->middleware('auth');
Route::post('/profile/{id}',[UserController::class, 'updateProfile'])->name('user.profile.update')->middleware('auth');
Route::get('/profile/change-password/{id}',[UserController::class, 'showChangePassProfile'])->name('user.profile.show.change.password')->middleware('auth');
Route::post('/profile/change-password/{id}',[UserController::class, 'updatePasswordProfile'])->name('user.profile.change.password')->middleware('auth');
Route::get('/userHistoryOrder/{id}',[OrderController::class, 'showOrder'])->name('user.history.order')->middleware('auth');
Route::get('/userDetailHistoryOrder/{id}',[OrderController::class, 'showDetailOrder'])->name('user.detail.history.order')->middleware('auth');
Route::post('/userDetailHistoryOrder/{id}',[OrderController::class, 'cancelBill'])->name('user.cancel.detail.history.order')->middleware('auth');
// ------------------Client---------------//

// ------------------Admin---------------//
Route::prefix('admin')->middleware('auth.admin')->group(function () {

    Route::get('/', [AdminHomeController::class,'index'])->name('admin.home');

    // Product
    Route::resource('product', ProductController::class);
    Route::get('product-image/{product_image}/delete', [ProductController::class, 'destroyImage'])->name('product-image.destroy');
    Route::get('product-color/{product_color}/delete', [ProductController::class, 'destroyColor'])->name('product-color.destroy');
    Route::get('product-size/{product_size}/delete', [ProductController::class, 'destroySize'])->name('product-size.destroy');
    // Product category
    Route::resource('product-category', ProductCategoriesController::class);
    Route::post('product-category/{product_category}/restore', [ProductCategoriesController::class, 'restore'])->name('product-category.restore');
    // Color
    Route::resource('color',ColorController::class);
    Route::post('color/{color}/restore', [ColorController::class, 'restore'])->name('color.restore');
    // Size
    Route::resource('size',SizeController::class);
    Route::post('size/{size}/restore', [SizeController::class, 'restore'])->name('size.restore');
    // Article category
    Route::resource('article-category', ArticleCategoriesController::class);
    Route::post('article-category/{article_category}/restore', [ArticleCategoriesController::class, 'restore'])->name('article-category.restore');
    // User
    Route::resource('user', UserController::class);
    // Web setting
    Route::resource('web-setting', WebInformationController::class);
    // Banner
    Route::resource('banner', BannerController::class);
    // Blog
    Route::resource('blog', BlogController::class);
    // About
    Route::resource('about', AboutController::class);
    // Order
    Route::resource('order', AdminOrderController::class);
});
// ------------------Admin---------------//


// -------------------slug--------------//
Route::post('/product-category-get-slug', [ProductCategoriesController::class, 'getSlug'])->name('product.category.get.slug');
Route::post('/article-category-get-slug', [ArticleCategoriesController::class, 'getSlug'])->name('article.category.get.slug');
Route::post('/product-get-slug', [ProductController::class, 'getSlug'])->name('product.get.slug');
Route::post('/blog-get-slug', [BlogController::class, 'getSlug'])->name('blog.get.slug');
Route::post('/color-get-slug', [ColorController::class, 'getSlug'])->name('color.get.slug');


// -------------------Auth--------------//
Route::get('/auth/google/redirect',[GoogleLoginController::class, 'redirect'])->name('google.redirect');

Route::get('/auth/google/callback',[GoogleLoginController::class, 'callback'])->name('google.callback');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Auth::routes();
