<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Auth::routes();
Route::get('/sitemap', [HomeController::class, 'sitemap']);
Route::post('/user_auth', [UserController::class, 'auth']);
Route::post('/profile', [UserController::class, 'profile']);
Route::post('/qrcode/render', [QRController::class, 'render']);

Route::get('/{any}', function () {
  return view('home');
})->where('any', '.*');
