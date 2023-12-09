<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/{id}', function () {
//     return view('welcome');
// });

// ------------------------------------------------------------------------------------------------------------------------------------------------------

// Menggunakan ::class dalam PHP memberikan nama kelas lengkap (fully qualified class name) sebagai string. Ini sering digunakan dalam konteks yang melibatkan autoloaders dan untuk menghindari kesalahan penulisan nama kelas.

// use App\Http\Controllers\UserController;

// // Tanpa menggunakan ::class
// $route = new Route('/user/{id}', 'UserController@show');

// // Menggunakan ::class
// $route = new Route('/user/{id}', [UserController::class, 'show']);

// ------------------------------------------------------------------------------------------------------------------------------------------------------

// method get dan post

// Dalam konteks pengembangan web, metode HTTP GET dan POST adalah dua metode utama yang digunakan untuk berinteraksi dengan server. Kedua metode ini digunakan untuk mengirimkan data dari klien ke server, tetapi mereka berbeda dalam cara data tersebut dikirim dan tujuan penggunaannya.
// https://www.duniailkom.com/tutorial-form-php-part-2-perbedaan-metode-pengiriman-form-get-dan-post-dalam-php/

// dashboard
Route::get('/dashboard', [AdminController::class,'dashboard_view']);
// detail
Route::get('/detail/{id}', [AdminController::class,'detail_view']);
// create
Route::get('/create', [AdminController::class,'create_view']);
// create/save
Route::post('/create/action', [AdminController::class,'create_action']);
// update
Route::get('/update/{id}', [AdminController::class,'update_view']);
// update/save
Route::post('/update/action', [AdminController::class,'update_action']);
// delete
Route::post('/delete/action', [AdminController::class,'delete_action']);