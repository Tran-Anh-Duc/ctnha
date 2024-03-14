<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailUserController;
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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});




//Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::get('/view_register', [AuthController::class, 'viewRegister'])->name('bread.viewRegister');
Route::get('/view_login', [AuthController::class, 'viewLogin'])->name('bread.viewLogin');
Route::post('/register', [AuthController::class, 'register'])->name('bread.register');
Route::post('/login', [AuthController::class, 'loginUser'])->name('bread.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('bread.logout');



//detail user

Route::get('/user/list', [DetailUserController::class, 'view_all_user'])->name('ctn.listUserDetail');
Route::get('/user/list/{id}', [DetailUserController::class, 'view_edit_user'])->name('ctn.editUserDetail');
Route::post('/user/create/{id}', [DetailUserController::class, 'create_info_user'])->name('ctn.createUserDetail');
