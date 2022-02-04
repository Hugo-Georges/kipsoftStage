<?php

use App\Models\Car;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\UserController;

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
Route::resource('cars', 'CarController');
Route::resource('user', 'UserController');

Route::resource('cars.comments', 'CommentController');

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/cars/preview', [CarController::class, 'preview']);
Route::get('dashboard', [CarController::class, 'dashboard'])->name('dashboard');
Route::get('preview', [CarController::class, 'preview'])->name('preview');
Route::get('myCars', [CarController::class, 'myCars'])->name('myCars');
Route::get('users', [UserController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
