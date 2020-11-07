<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
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

Route::get('/', [App\Http\Controllers\FrontendController::class,'login']);
Route::post('login_submit', [App\Http\Controllers\FrontendController::class,'login_submit']);
Route::get('registration', [App\Http\Controllers\FrontendController::class,'registration']);
Route::post('registration_submit', [App\Http\Controllers\FrontendController::class,'registration_submit']);
Route::get('email_verify_code_view', [App\Http\Controllers\FrontendController::class,'email_verify_code_view']);
Route::post('email_verify_code', [App\Http\Controllers\FrontendController::class,'email_verify_code']);
Route::get('email_check_view', [App\Http\Controllers\FrontendController::class,'email_check_view']);
Route::post('email_check', [App\Http\Controllers\FrontendController::class,'email_check']);
Route::get('password_verify', [App\Http\Controllers\FrontendController::class,'password_verify']);
Route::post('password_verify_code', [App\Http\Controllers\FrontendController::class,'password_verify_code']);
Route::get('change_password_view', [App\Http\Controllers\FrontendController::class,'change_password_view']);
Route::post('change_password', [App\Http\Controllers\FrontendController::class,'change_password']);
Route::get('logout', [App\Http\Controllers\FrontendController::class,'logout']);
Route::get('fb_callback', [App\Http\Controllers\FrontendController::class,'fb_callback']);
