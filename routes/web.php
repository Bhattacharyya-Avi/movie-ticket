<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\MovieController;
use App\Http\Controllers\Backend\SlotController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\LoginController as FrontendLoginController;
use App\Http\Controllers\Frontend\MovieController as FrontendMovieController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//frontend
Route::get('/frontend/master',[FrontendHomeController::class,'master'])->name('frontend.master');
Route::get('/',[FrontendHomeController::class,'index'])->name('frontend.index');
Route::group(['prefix'=>'user'],function(){
    Route::get('/',[FrontendLoginController::class,'login'])->name('user.login');
    Route::get('/registration',[FrontendLoginController::class,'registration'])->name('user.registration');
    Route::get('/movie/list',[FrontendMovieController::class,'movieList'])->name('movie.list');
    Route::get('/all/movies',[FrontendMovieController::class,'allMovie'])->name('all.movie.list');
    Route::get('/movie/category/{id}',[FrontendMovieController::class,'categoryMovie'])->name('category.movie.list');
});





Route::group(['prefix'=>'admin'], function(){
    //backend
    Route::get('/',[LoginController::class,'login'])->name('admin.login');

    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('admin.dashboard');

    //category
    Route::get('/category/list',[CategoryController::class,'category'])->name('admin.category');
    Route::post('/category/create',[CategoryController::class,'categoryCreate'])->name('admin.category.create');
    Route::get('/category/edit/{id}',[CategoryController::class,'categoryEdit'])->name('admin.category.edit');
    Route::put('/category/update/{id}',[CategoryController::class,'categoryEditUpdate'])->name('admin.category.edit.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'categoryDelete'])->name('admin.category.delete');
    Route::get('/category/restore/{id}',[CategoryController::class,'categoryRestore'])->name('admin.category.restore');

    //slot
    Route::get('/slot/list',[SlotController::class,'slot'])->name('admin.slot');
    Route::post('/slot/create',[SlotController::class,'slotCreate'])->name('admin.slot.create');
    Route::get('/slot/edit/{id}',[SlotController::class,'slotEdit'])->name('admin.slot.edit');
    Route::put('/slot/update/{id}',[SlotController::class,'slotUpdate'])->name('admin.slot.update');
    Route::get('/slot/delete/{id}',[SlotController::class,'slotDelete'])->name('admin.slot.delete');
    Route::get('/slot/restore/{id}',[SlotController::class,'slotRestore'])->name('admin.slot.restore');

    //movie
    Route::get('/movie/list',[MovieController::class,'movie'])->name('admin.movie.list');
    Route::post('/movie/add',[MovieController::class,'movieAdd'])->name('admin.movie.add');
    Route::get('/movie/edit/{id}',[MovieController::class,'movieEdit'])->name('admin.movie.edit');
    Route::put('/movie/update/{id}',[MovieController::class,'movieUpdate'])->name('admin.movie.update');
    Route::get('/movie/delete/{id}',[MovieController::class,'moviedelete'])->name('admin.movie.delete');
    Route::get('/movie/restore/{id}',[MovieController::class,'movierestore'])->name('admin.movie.restore');
});




