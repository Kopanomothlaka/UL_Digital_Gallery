<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\TimelineController;


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
})->name('home');
Route::get('/UserHome', function () {
    return view('UserHome');
})->name('UserHome');


Route::get('/news', function () {
    return view('news');
});
Route::get('/pictures', [TimelineController::class, 'showPictures'])->name('pictures');

Route::get('/videos', function () {
    return view('videos');
});
Route::get('/2020-2024', function () {
    return view('2020-2024');
});
Route::get('/contact', function () {
    return view('contact');
});


Route::get('/log', [AuthManager::class, 'log'])->name('log');
Route::post('/log', [AuthManager::class, 'logPost'])->name('log.post');


Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');


Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', function () {
        return "eyy";
    });

});

Route::get('/forget-password', [ForgetPasswordManager::class, "forgetPassword"])->name('forget.password');
Route::post('/forget-password', [ForgetPasswordManager::class, "forgetPasswordPost"])->name('forget.password.post');

Route::get('/reset-password/{token}', [ForgetPasswordManager::class, "resetPassword"])->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManager::class, "resetPasswordPost"])->name('reset.password.post');


// routes/web.php
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');


});


Route::post('/post-to-timeline', [TimelineController::class, 'postToTimeline'])->name('post.timeline');



