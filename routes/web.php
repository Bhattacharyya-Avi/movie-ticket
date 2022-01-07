<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\MovieController;
use App\Http\Controllers\Backend\SeatController;
use App\Http\Controllers\Backend\SlotController;
use App\Http\Controllers\Backend\TicketBookController as BackendTicketBookController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\LoginController as FrontendLoginController;
use App\Http\Controllers\Frontend\MovieController as FrontendMovieController;
use App\Http\Controllers\Frontend\TicketBookController;
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


//frontend
Route::get('/frontend/master',[FrontendHomeController::class,'master'])->name('frontend.master');
Route::get('/',[FrontendHomeController::class,'index'])->name('frontend.index');
Route::group(['prefix'=>'user'],function(){
    Route::get('/',[FrontendLoginController::class,'login'])->name('user.login');
    Route::post('/login/post',[FrontendLoginController::class,'doLogin'])->name('user.do.login');
    Route::get('/registration',[FrontendLoginController::class,'registration'])->name('user.registration');
    Route::post('/registration/post',[FrontendLoginController::class,'registrationPost'])->name('user.do.registration');
    Route::get('/user/logout',[FrontendLoginController::class,'userLogout'])->name('user.logout');
    
    Route::group(['middleware'=>['auth','user']],function(){
        Route::get('/movie/list',[FrontendMovieController::class,'movieList'])->name('movie.list');
        Route::get('/all/movies',[FrontendMovieController::class,'allMovie'])->name('all.movie.list');
        Route::get('/search/movies',[FrontendMovieController::class,'searchMovie'])->name('sharch.movie');
        Route::get('/movie/category/{id}',[FrontendMovieController::class,'categoryMovie'])->name('category.movie.list');
        Route::get('/movie/details/{id}',[FrontendMovieController::class,'singleMovie'])->name('single.movie.view');
        Route::get('/movie/search',[FrontendMovieController::class,'searchMovie'])->name('search.movie');

        Route::get('/book/ticket/movie/{id}',[TicketBookController::class,'bookMovie'])->name('book.ticket.movie');
        Route::post('/book/ticket',[TicketBookController::class,'bookTicket'])->name('book.ticket.movie.post');



    });
    
});
//backend
Route::group(['prefix'=>'admin'], function(){
    
    Route::get('/',[LoginController::class,'login'])->name('admin.login');
    Route::post('/admin/login',[LoginController::class,'doLogin'])->name('admin.do.login');

    Route::group(['middleware'=>['auth','admin']],function(){
        Route::get('/admin/logout',[LoginController::class,'logout'])->name('admin.logout');
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

        //seat
        Route::get('/seat/list',[SeatController::class,'seat'])->name('admin.seat.list');
        Route::post('/seat/add',[SeatController::class,'seatadd'])->name('admin.seat.add');
        Route::get('/seat/edit/{id}',[SeatController::class,'seatEdit'])->name('admin.seat.edit');
        Route::put('/seat/update/{id}',[SeatController::class,'seatUpdate'])->name('admin.seat.update');
        Route::get('/seat/delete/{id}',[SeatController::class,'seatDetele'])->name('admin.seat.delete');
        Route::get('/seat/restore/{id}',[SeatController::class,'seatRestore'])->name('admin.seat.restore');

        //Ticket book list
        Route::get('/ticket/book/list',[BackendTicketBookController::class,'bookList'])->name('admin.ticket.book.list');
        Route::get('/ticket/details/{id}',[BackendTicketBookController::class,'bookDetails'])->name('admin.ticket.details.view');
    });
    
});




