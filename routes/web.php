<?php


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

use App\Http\Controllers\AdminController; 
use App\Http\Controllers\Category1Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homescreen');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
    Route::get('/home','index')->name('home');
    Route::get('/post/{slug}', 'masterPage')->name('master.page');
});

Route::prefix("admin")->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::match(['get','post'],'/login','login')->name('admin.login');

        Route::middleware('auth:admin')->group(function(){
            Route::get('/','index')->name('admin.dashboard');

            Route::controller(Category1Controller::class)->group(function(){
                Route::get('/all-category','allCats')->name('cat.all');
                Route::get('/create-category-page','createCat')->name('cat.create');
                Route::get('/edit-category-page/{id}','editCat')->name('cat.edit');
                Route::post('/update-category/{id}','updateCat')->name('cat.update');
                Route::post('/store-category','store')->name('cat.store');
                Route::get('/delete-category/{id}','delete')->name('cat.delete');
            });

            Route::get('/admin/logout', 'logout')->name('admin.logout');

            Route::controller(PostController::class)->group(function(){
                Route::get('/all-post','allPosts')->name('post.all');
                Route::get('/create-post-page','createPost')->name('post.create');
                Route::post('/create-post-page/create','createNewPost')->name('post.new');
                Route::get('/edit-post-page/{id}','editPost')->name('post.edit');
                Route::post('/update-post/{id}','updatePost')->name('post.update');
                Route::get('/delete-post/{id}','delete')->name('post.delete');
            });
        });
    });
});
