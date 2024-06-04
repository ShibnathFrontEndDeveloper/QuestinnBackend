<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\ProfileController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\FeatureController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//API route for register new user
Route::post('/register', [LoginController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/profile ',[ProfileController::class,'index']);
    Route::get('/profile ',[ProfileController::class,'profile_data']);
    Route::get('/packages ',[FeatureController::class,'packages']);
    Route::get('/addon_options',[FeatureController::class,'additional_options']);
    Route::post('/addon_options',[FeatureController::class,'add_options']);
    Route::get('/banner',[FeatureController::class,'banner']);
    Route::get('/coupon',[FeatureController::class,'Coupon']);
    Route::get('/vehicle_type_list',[FeatureController::class,'vehicle_type_list']);
    Route::post('/payment ',[OrderController::class,'checkout_complete']);
    Route::get('/booking_history',[FeatureController::class,'booking_history']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




