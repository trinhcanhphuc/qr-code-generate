<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobileApi\AuthController;
use App\Http\Controllers\MobileApi\UserController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::middleware('auth:api')->group(function(){
  Route::post('/user/history/{page_number}', [UserController::class, 'history']);
});