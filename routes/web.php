<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[App\Http\Controllers\Photos::class,'index'])->name('home');
Route::get('/get_photos',[App\Http\Controllers\Photos::class,'getPhotos']);
Route::get('/welcome',function(){return view('welcome');});
Route::get('/get_photographer',[App\Http\Controllers\Photographers::class,'getPhotographer'])->name('photographer.get');
Route::get('/photographers',[App\Http\Controllers\Photographers::class,'index'])->name('photographers');
Route::get('/photographer/{id}',[App\Http\Controllers\Photographers::class,'show'])->name('photographer');