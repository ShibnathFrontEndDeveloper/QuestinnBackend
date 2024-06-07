<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\RegistrationController;
use App\Http\Controllers\web\LoginController;
use App\Http\Controllers\web\OrderController;
use App\Http\Controllers\web\profileController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
//new
Route::get('/get_total_amount', [HomeController::class, 'get_total_amount'])->name('get_total_amount');
Route::get('/get_total_room_available', [HomeController::class, 'get_total_room_available'])->name('get_total_room_available');
//new
Route::get('/contact_us', [HomeController::class, 'contact_us'])->name('contact_us');
Route::get('/facilities', [HomeController::class, 'facilities'])->name('facilities');
Route::get('/food', [HomeController::class, 'food'])->name('food');
Route::get('/room', [HomeController::class, 'room'])->name('room');
Route::get('/foods/{category}', [HomeController::class, 'category_foods'])->name('foods');
Route::post('add/contact_us', [HomeController::class, 'save_contact'])->name('add.contact');
Route::get('room_details/{id}', [HomeController::class, 'room_details'])->name('roomDetails');
Route::post('searchByFilter', [HomeController::class, 'searchByfilter'])->name('searchByFilter');
Route::post('room_booked', [HomeController::class, 'room_booked'])->name('room_booked');

//new
Route::post('room-booked-checkout', [HomeController::class, 'room_booked_checkout'])->name('room_booked_checkout');
//new
Route::get('room_booking/{slug}', [HomeController::class, 'room_booking'])->name('room_booking');
Route::post('add-to-cart-food', [OrderController::class, 'food_booking'])->name('add-to-cart-food');
Route::post('update-cart', [OrderController::class, 'update_cart'])->name('update_cart');
Route::post('remove-from-cart', [OrderController::class, 'remove_from_cart'])->name('remove_from_cart');
Route::get('checkout-details', [OrderController::class, 'checkout_food'])->name('food_details');
Route::get('food-payment', [OrderController::class, 'food_payment'])->name('food_payment');

//new
Route::post('food-payment-confirm', [OrderController::class, 'food_payment_confirm'])->name('food_payment_confirm');
Route::post('food_payment_online', [OrderController::class, 'food_payment_online'])->name('food_payment_online');
//new


Route::post('food-for-room', [OrderController::class, 'food_for_room'])->name('food_for_room');
Route::post('food-order', [OrderController::class, 'food_order'])->name('food_order');

Route::post('/register', [RegistrationController::class, 'register'])->name('register');
Route::get('/register', [RegistrationController::class, 'register_view'])->name('register_view');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'login_view'])->name('loginview');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/Profile', [profileController::class, 'profile'])->name('profile');
Route::post('/edit-profile', [profileController::class, 'edit_profile'])->name('edit_profile');
Route::post('/send-forget-mail', [LoginController::class, 'send_forget_mail'])->name('send_forget_mail');
Route::post('/check-otp', [LoginController::class, 'check_otp'])->name('check_otp');
Route::post('/reset-password', [LoginController::class, 'reset_password'])->name('reset_password');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/testing', [LoginController::class, 'testing']);

Route::group(['namespace' => 'Customer', 'prefix' => 'customer', 'as' => 'customers.'], function () {
    Route::get('/profile', [profileController::class, 'profile'])->name('profile');
    Route::get('/room_details', [profileController::class, 'room_details'])->name('room_details');
    Route::get('/food_details', [profileController::class, 'food_details'])->name('food_details');
    Route::post('/rate_us', [profileController::class, 'rate_us'])->name('rate_us');
});
