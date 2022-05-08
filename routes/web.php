<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BannerController;


use App\Http\Controllers\HomeContorller;

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

Route::get('/',[HomeContorller::class, 'home']);
Route::get('service/{id}',[HomeContorller::class, 'service_detail']);
Route::get('page/about-us',[PageController::class, 'about_us']);
Route::get('page/contact-us',[PageController::class, 'contact_us']);
Route::post('page/save-contactus',[PageController::class, 'save_contactus']);

// Admin dashboard
Route::get('admin', [AdminController::class, 'dashboard']);

//Admin Login/Logout
Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'validation_login']);
Route::get('admin/logout', [AdminController::class, 'logout']);

// Banner Routes
Route::get('admin/banner/{id}/delete', [BannerController::class, 'destroy']);
Route::resource('admin/banner', BannerController::class);
// Roomtype Routes
Route::get('admin/roomtype/{id}/delete', [RoomtypeController::class, 'destroy']);
Route::resource('admin/roomtype', RoomtypeController::class);

// Room Routes
Route::get('admin/rooms/{id}/delete', [RoomController::class, 'destroy']);
Route::resource('admin/rooms', RoomController::class);

// Customer Routes
Route::get('admin/customer/{id}/delete', [CustomerController::class, 'destroy']);
Route::resource('admin/customer', CustomerController::class);

// Room type image Routes
Route::get('admin/roomtypeimage/{id}/delete', [RoomtypeController::class, 'destroy_image']);

// Department Routes
Route::get('admin/department/{id}/delete', [DepartmentController::class, 'destroy']);
Route::resource('admin/department', DepartmentController::class);

//Staff payment
Route::get('admin/staff/payments/{id}', [StaffController::class, 'all_payments']);
Route::get('admin/staff/payment/{id}/add', [StaffController::class, 'add_payment']);
Route::post('admin/staff/payment/{id}', [StaffController::class, 'save_payment']);
Route::get('admin/staff/payment/{id}/{staff_id}/delete', [StaffController::class, 'delete_payment']);
// Staff Crud
Route::get('admin/staff/{id}/delete', [StaffController::class, 'destroy']);
Route::resource('admin/staff', StaffController::class);

// Booking Crud
Route::get('admin/booking/{id}/delete', [BookingController::class, 'destroy']);
Route::get('admin/booking/available-rooms/{checkin_date}', [BookingController::class, 'available_rooms']);
Route::resource('admin/booking', BookingController::class);


Route::get('login', [CustomerController::class, 'login']);
Route::post('customer/login', [CustomerController::class, 'customer_login']);
Route::get('register', [CustomerController::class, 'register']);
Route::get('logout', [CustomerController::class, 'logout']);

Route::get('booking', [BookingController::class, 'front_booking']);

// Service Routes
Route::get('admin/service/{id}/delete', [ServiceController::class, 'destroy']);
Route::resource('admin/service', ServiceController::class);

//testimonial
Route::get('customer/add-testimonial', [HomeContorller::class, 'add_testimonial']);
Route::post('customer/save-testimonial', [HomeContorller::class, 'save_testimonial']);
Route::get('admin/testimonials', [AdminController::class, 'testimonials']);
Route::get('admin/testimonial/{id}/delete', [AdminController::class, 'destroy_testimonail']);


