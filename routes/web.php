<?php

use App\Models\Car;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CommentController;
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

Route::resource('cars.comments', 'CommentController');

Route::get('/', function () {
    return view('accueil');
});

Route::get('index', [CarController::class, 'index'])->name('index');


