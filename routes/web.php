<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\contactUsController;
use App\Http\Controllers\aboutUsController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\forgotPasswordController;
use App\Http\Controllers\profile;

Route::get('/', function () {
    return view('Unregistered.login');
})->name('login');
//for show sign up page
Route::get('/signup', [loginController::class,'showSignUp'])->name('show.signup');
//for unreg users home page
Route::get('/home-unreg', [loginController::class, 'viewHomePageForUnregistered'])->name('home.unreg');
//for signing up a customer
Route::post('/createNewAccount', [loginController::class, 'registerPost'])->name('register');
//for login
Route::post('/login-user',[loginController::class, 'loginPost'])->name('login.user');
//for viewing homepage
Route::get('/homepage',[loginController::class, 'viewHomePage'])->name('home');
//for logging out
Route::get('/loggingout',[loginController::class, 'logout'])->name('log.out');
//for showing contact us page for registed users
Route::get('/contact-us', [contactUsController::class, 'viewContactUsPage'])->name('contact.us');
//for unreg users for contact us page
Route::get('/contact-us-unreg', [contactUsController::class, 'viewContactUsPageForUnregistered'])->name('contact.us.unreg');
//for showing the about us page for registered users
Route::get('/about-us', [aboutUsController::class, 'viewAboutUsPage'])->name('about.us');
//for unreg users about page
Route::get('/about-us-unreg', [aboutUsController::class, 'viewAboutUsPageForUnregistered'])->name('about.us.unreg');
//for reg and unreg users to contact us
Route::post('/contact-us-form', [contactUsController::class, 'contactUs'])->name('contactUs');

//for reg users shop page
Route::get('/reg-shop', [shopController::class, 'shop'])->name('shop');

//for reg users product details
Route::get('/reg-shop/{product_slug}', [shopController::class, 'product_details'])->name('shop.product.details');

//for reg users cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

//for reg users cart add
Route::post('/cart/add', [CartController::class, 'add_to_cart'])->name('cart.add');

//for incraese cart quantity
Route::put('cart/increase-quantuity/{rowId}', [CartController::class, 'increase_cart_quantity'])->name('cart.qty.increase');

//for decraese cart quantity
Route::put('cart/decrease-quantuity/{rowId}', [CartController::class, 'decrease_cart_quantity'])->name('cart.qty.decrease');

//for admin dashboard
Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.index');

//for admin brands
Route::get('/admin-dashboard/brands', [AdminController::class, 'brands'])->name('admin.brands');

//for admin brand additions
Route::get('/admin-dashboard/brand/add', [AdminController::class, 'add_brand'])->name('admin.brand.add');

//for admin brand storage
Route::post('/admin-dashboard/brand/store', [AdminController::class, 'brand_store'])->name('admin.brand.store');

//for admin categories
Route::get('/admin-dashboard/categories', [AdminController::class, 'categories'])->name('admin.categories');

//for admin category additions
Route::get('/admin-dashboard/category/add', [AdminController::class, 'category_add'])->name('admin.category.add');

//for admin category storage
Route::post('/admin-dashboard/category/store', [AdminController::class, 'category_store'])->name('admin.category.store');

//for admin products
Route::get('/admin-dashboard/products', [AdminController::class, 'products'])->name('admin.products');

//for admin product additions
Route::get('/admin-dashboard/product/add', [AdminController::class, 'product_add'])->name('admin.product.add');

//for admin product storage
Route::post('/admin-dashboard/product/store', [AdminController::class, 'product_store'])->name('admin.product.store');
//for users to reset their password
Route::get('/resetPassword/showPage', [forgotPasswordController::class, 'viewForgotPasswordPage'])->name('show.forgotpasswordpage');

Route::post('/resetPassword/sendEmail', [forgotPasswordController::class, 'forgetPasswordPost'])->name('forgotpassword.email');

Route::get('/resetPassword/{token}', [forgotPasswordController::class, 'resetPassword'])->name('reset.password');


Route::post('/resetPassword/resetPassword', [forgotPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');


Route::get('/checkout', [checkoutController::class, 'checkoutPage'])->name('checkout');

//for stripe
Route::post('stripe',[StripeController::class, 'stripe'])->name('stripe');
Route::get('success',[StripeController::class, 'success'])->name('success');
Route::get('cancel',[StripeController::class, 'cancel'])->name('cancel');

//for customer profile
Route::get('/customerProfile', [profile::class, 'viewProfile'])->name('customer.profile');
//to update the profile
Route::post('/customer/updateProfile', [profile::class, 'updateProfile'])->name('customer.updateProfile');
//for place order
Route::get('/customer/placeorder', [checkoutController::class, 'checkout'])->name('customer.placeorder');
Route::post('/customer/placeorderpost', [checkoutController::class, 'placeOrderPost'])->name('place.order.post');

Route::get('/search-products', [searchController::class, 'search'])->name('product.search'); //for searching products
