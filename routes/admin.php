<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\FacilitiesController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\ContactUsController;
use App\Http\Controllers\admin\FoodController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RestaurantController;
use App\Http\Controllers\admin\BriefController;
use App\Http\Controllers\admin\RatingController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    // Route::get('/', function (){
    //     return view('admin.admin-views.auth.login');
    // });
    Route::get('/', [LoginController::class, 'loginView'])->name('loginView');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/log-out', [LoginController::class, 'logOut'])->name('log_out');
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::group(['prefix' => 'roomsorder', 'as' => 'roomorders.'], function () {
            Route::get('/list/{status}', [OrderController::class, 'list'])->name('list');
            Route::get('/order-details/{id}', [OrderController::class, 'order_details'])->name('orders_details');
            Route::post('/status', [OrderController::class, 'status'])->name('status');            
            Route::post('/paid-status', [OrderController::class, 'paid_status'])->name('paidStatus');            
            Route::post('/assign_room_no', [OrderController::class, 'assign_room_no'])->name('assign_room_no');            
            Route::post('/assignRoomNO', [OrderController::class, 'assign_roomNo'])->name('assign_roomNo');                    
        });

        Route::group(['prefix' => 'banner', 'as' => 'banner.'], function () {
            Route::get('/list', [BannerController::class, 'list'])->name('list');
            Route::get('/add', [BannerController::class, 'addView'])->name('addView');
            Route::post('/add', [BannerController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('delete');
            Route::post('/update/{id}', [BannerController::class, 'update'])->name('update');
        });  
        
        Route::group(['prefix' => 'gallery', 'as' => 'galleries.'], function () {
            Route::get('/list', [GalleryController::class, 'list'])->name('list');
            Route::get('/add', [GalleryController::class, 'addView'])->name('addView');
            Route::post('/add', [GalleryController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [GalleryController::class, 'delete'])->name('delete');
            Route::post('/update/{id}', [GalleryController::class, 'update'])->name('update');
        }); 

        Route::group(['prefix' => 'rooms', 'as' => 'rooms.'], function () {
            Route::get('/list', [RoomController::class, 'list'])->name('list');
            Route::get('/add', [RoomController::class, 'addView'])->name('addView');
            Route::post('/room-add', [RoomController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('edit');
            Route::get('/roomNo/{id}', [RoomController::class, 'view'])->name('roomNo');
            Route::get('/delete/{id}', [RoomController::class, 'delete'])->name('delete');
            Route::post('/update/{id}', [RoomController::class, 'update'])->name('update');
            Route::post('/add-room-no/{id}', [RoomController::class, 'add_room_no'])->name('add_room_no');
            Route::get('/room-no-delete/{id}', [RoomController::class, 'room_delete'])->name('delete_room_no');
        });

        Route::group(['prefix' => 'testimonial', 'as' => 'testimonial.'], function () {
            Route::get('/list', [TestimonialController::class, 'list'])->name('list');
            Route::get('/add', [TestimonialController::class, 'addView'])->name('addView');
            Route::post('/facilities-add', [TestimonialController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [TestimonialController::class, 'delete'])->name('delete');
            Route::post('/update/{id}', [TestimonialController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'facilities', 'as' => 'facilities.'], function () {
            Route::get('/list', [FacilitiesController::class, 'list'])->name('list');
            Route::get('/add', [FacilitiesController::class, 'addView'])->name('addView');
            Route::post('/facilities-add', [FacilitiesController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [FacilitiesController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [FacilitiesController::class, 'delete'])->name('delete');
            Route::post('/update/{id}', [FacilitiesController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'coupon', 'as' => 'coupons.'], function () {
            Route::get('/list', [CouponController::class, 'list'])->name('list');
            Route::get('/add', [CouponController::class, 'addView'])->name('addView');
            Route::post('/facilities-add', [CouponController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [CouponController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [CouponController::class, 'delete'])->name('delete');
            Route::post('/update/{id}', [CouponController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'restaurant', 'as' => 'restaurants.'], function () {
            Route::get('/list', [RestaurantController::class, 'list'])->name('list');
            Route::get('/add', [RestaurantController::class, 'addView'])->name('addView');
            Route::post('/add', [RestaurantController::class, 'add'])->name('add');
            Route::get('/view/{id}', [RestaurantController::class, 'view'])->name('view');
            Route::get('/edit/{id}', [RestaurantController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [RestaurantController::class, 'delete'])->name('delete');
            Route::post('/update/{id}', [RestaurantController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'category', 'as' => 'categories.'], function () {
            Route::get('/list', [CategoryController::class, 'list'])->name('list');
            Route::get('/add', [CategoryController::class, 'addView'])->name('addView');
            Route::post('/category-add', [CategoryController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'food_category', 'as' => 'food_categories.'], function () {
            Route::get('/list', [CategoryController::class, 'food_list'])->name('list');
            Route::get('/add', [CategoryController::class, 'food_addView'])->name('addView');
            Route::post('/category-add', [CategoryController::class, 'food_add'])->name('add');
            Route::get('/edit/{id}', [CategoryController::class, 'food_edit'])->name('edit');
            Route::get('/delete/{id}', [CategoryController::class, 'food_delete'])->name('delete');
            Route::post('/update/{id}', [CategoryController::class, 'food_update'])->name('update');
            // Route::post('/select_foods', [CategoryController::class, 'select_foods'])->name('select_foods');
        });

        Route::group(['prefix' => 'restaurant', 'as' => 'restaurant.'], function () {            
            Route::post('/select_foods', [CategoryController::class, 'select_foods'])->name('select_foods');
            Route::post('/foodAmount', [CategoryController::class, 'foodAmount'])->name('foodAmount');
        });

        Route::group(['prefix' => 'brief', 'as' => 'brief.'], function () {
            Route::get('/list', [BriefController::class, 'list'])->name('list');
            Route::get('/add', [BriefController::class, 'addView'])->name('addView');
            Route::post('/foods-add', [BriefController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [BriefController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [BriefController::class, 'delete'])->name('delete');
            Route::post('/update/{id}', [BriefController::class, 'update'])->name('update');            
        });
        
        Route::group(['prefix' => 'food', 'as' => 'foods.'], function () {
            Route::get('/list', [FoodController::class, 'list'])->name('list');
            Route::get('/add', [FoodController::class, 'addView'])->name('addView');
            Route::post('/foods-add', [FoodController::class, 'add'])->name('add');
            Route::get('/edit/{id}', [FoodController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [FoodController::class, 'delete'])->name('delete');
            Route::post('/update/{id}', [FoodController::class, 'update'])->name('update');
            Route::get('/status/{id}/{is_active}', [FoodController::class, 'status'])->name('status');
            Route::get('/food-orders', [FoodController::class, 'food_orders'])->name('food_orders');
            Route::get('/food-paid-status/{value}/{id}', [FoodController::class, 'food_order_status'])->name('food_paid_status');
            Route::get('/order_details/{id}', [FoodController::class, 'order_view'])->name('order_view');
        });

        Route::group(['prefix' => 'contact_us', 'as' => 'contact_us.'], function () {
            Route::get('/list', [ContactUsController::class, 'list'])->name('list');
            Route::group(['prefix' => 'details', 'as' => 'details.'], function () {
                Route::get('/view', [ContactUsController::class, 'view'])->name('view');                
                Route::post('/update', [ContactUsController::class, 'update'])->name('update');
            });            
        });

        Route::group(['prefix' => 'user', 'as' => 'users.'], function () {
            Route::get('/list', [UserController::class, 'list'])->name('list');                            
            Route::get('/status/{value}/{user_id}', [UserController::class, 'status'])->name('status');                            
        });
        
        Route::group(['prefix' => 'rating', 'as' => 'ratings.'], function () {
            Route::get('/list', [RatingController::class, 'list'])->name('list');                            
        });

        Route::group(['prefix' => 'booking', 'as' => 'booking.'], function () {
            Route::get('/room-booking', [OrderController::class, 'place_order_view'])->name('room');                
            Route::post('/room-change', [OrderController::class, 'room_change'])->name('room-chenage');                
            Route::post('/room', [OrderController::class, 'store'])->name('store');                
            // Route::get('/status/{value}/{user_id}', [UserController::class, 'status'])->name('status');                            
        });

        Route::group(['prefix' => 'about', 'as' => 'about.'], function () {
            Route::get('/edit', [AboutController::class, 'view'])->name('view');
            Route::post('/update', [AboutController::class, 'update'])->name('update');
            Route::group(['prefix' => 'management_team', 'as' => 'management_team.'], function () {
                Route::get('/list', [AboutController::class, 'list'])->name('list');
                Route::get('/add', [AboutController::class, 'addView'])->name('addView');
                Route::post('/add', [AboutController::class, 'add'])->name('add');
                Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('edit');
                Route::get('/delete/{id}', [AboutController::class, 'delete'])->name('delete');
                Route::post('/update/{id}', [AboutController::class, 'manage_update'])->name('update');
            });
        });
        
    });


});




