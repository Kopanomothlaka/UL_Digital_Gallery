<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VideoSearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;


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


Route::get('/forget-password', [ForgetPasswordManager::class, "forgetPassword"])->name('forget.password');
Route::post('/forget-password', [ForgetPasswordManager::class, "forgetPasswordPost"])->name('forget.password.post');

Route::get('/reset-password/{token}', [ForgetPasswordManager::class, "resetPassword"])->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManager::class, "resetPasswordPost"])->name('reset.password.post');


Route::get('/pictures', [TimelineController::class, 'showPictures'])->name('pictures');
Route::post('/post-to-timeline', [TimelineController::class, 'postToTimeline'])->name('post.timeline');


Route::get('/videos', [VideoController::class, 'showVideos'])->name('videos');
Route::post('/upload-video', [VideoController::class, 'uploadVideo'])->name('video.upload');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', function () {
        return "eyy";
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
});


Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search_videos', [VideoSearchController::class, 'search'])->name('video.search');

Route::get('/posts/{id}', [TimelineController::class, 'delete'])->name('posts.delete');
Route::get('/videos/{id}', [VideoController::class, 'delete'])->name('videos.delete');


Route::post('/videos/{video}/like', [VideoController::class, 'like'])->name('videos.like');
Route::post('/videos/{video}/unlike', [VideoController::class, 'unlike'])->name('videos.unlike');

Route::post('/posts/{id}/like', [TimelineController::class, 'like'])->middleware('auth')->name('posts.like');
Route::post('/posts/{id}/unlike', [TimelineController::class, 'unlike'])->middleware('auth')->name('posts.unlike');

Route::put('/posts/{id}/updateCaption', [TimelineController::class, 'updateCaption'])->name('posts.updateCaption');
Route::put('/videos/{id}/updateTitle', [VideoController::class, 'updateTitle'])->name('videos.updateTitle');

Route::put('/profile/updatePicture', [ProfileController::class, 'updatePicture'])->name('profile.updatePicture');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');


//admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth:admins');

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/users', [DashboardController::class, 'users'])->name('admin.users');
    Route::post('/block-user/{id}', [DashboardController::class, 'blockUser'])->name('admin.block.user');
    Route::post('/delete-user/{id}', [DashboardController::class, 'deleteUser'])->name('admin.delete.user');


    Route::get('/AdminPictures', [DashboardController::class, 'AdminPictures'])->name('admin.AdminPictures');
    Route::get('/AdminVideos', [DashboardController::class, 'AdminVideos'])->name('admin.AdminVideos');
    Route::get('/admin/posts/pending', [DashboardController::class, 'pendingPosts'])->name('admin.posts.pending');
    Route::post('/admin/posts/{post}/approve', [DashboardController::class, 'approvePost'])->name('admin.posts.approve');
    Route::post('/admin/posts/{post}/reject', [DashboardController::class, 'rejectPost'])->name('admin.posts.reject');

});






