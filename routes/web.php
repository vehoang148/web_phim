<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


Route::get('/', [IndexController::class,'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class,'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class,'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class,'country'])->name('country');
Route::get('/nam/{year}', [IndexController::class, 'year'])->name('year');
Route::get('/phim/{slug}', [IndexController::class,'movie'])->name('movie');
Route::get('/tag/{tag}', [IndexController::class, 'tag']);
Route::get('/tim-kiem', [IndexController::class,'timkiem'])->name('tim-kiem');
Route::get('/xem-phim/{slug}/{tap}', [IndexController::class,'watch']);
//lọc phim
Route::get('/locphim', [IndexController::class,'loc_phim'])->name('locphim');
//Tập phim
Route::get('/so-tap', [IndexController::class,'episode'])->name('so-tap');

Auth::routes();

Route::get('/home', [HomeController::class, 'index']);

Route::resource('category',CategoryController::class);
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('episode', EpisodeController::class);
Route::get('select-movie', [EpisodeController::class, 'select_movie'])->name('select-movie');
Route::resource('movie', MovieController::class);
Route::get('/update-year-phim', [MovieController::class,'update_year']);