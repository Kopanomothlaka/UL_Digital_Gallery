<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/createAccount', function () {
    return view('createAccount');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/pictures', function () {
    return view('pictures');
});
Route::get('/videos', function () {
    return view('videos');
});
Route::get('/2020-2024', function () {
    return view('2020-2024');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/ResetPass', function () {
    return view('ResetPass');
});