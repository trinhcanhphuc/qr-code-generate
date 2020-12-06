<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRController;
use App\Http\Controllers\HomeController;

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
Route::get('/sitemap', [HomeController::class, 'sitemap']);
Route::get('/{any}', function () {
  return view('home');
})->where('any', '.*');

Route::post('/qrcode/render', [QRController::class, 'render']);
