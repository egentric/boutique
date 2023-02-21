<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\RangeController;
use App\Http\Controllers\ArticleController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('articles', ArticleController::class);
Route::resource('promos', PromoController::class);
Route::resource('ranges', RangeController::class);
Route::resource('sizes', SizeController::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/users', UserController::class)->except('index', 'create', 'store');


Route::get('/giletstabilisateur', [App\Http\Controllers\HomeController::class, 'indexStab'])->name('indexStab');
Route::get('/vuegiletstabilisateur/{article}', [App\Http\Controllers\HomeController::class, 'showStab'])->name('showStab');

Route::get('/combinaison', [App\Http\Controllers\HomeController::class, 'indexCombi'])->name('indexCombi');
Route::get('/vuecombinaison/{article}', [App\Http\Controllers\HomeController::class, 'showCombi'])->name('showCombi');

Route::get('/detendeur', [App\Http\Controllers\HomeController::class, 'indexDet'])->name('indexDet');
Route::get('/vuedetendeur/{article}', [App\Http\Controllers\HomeController::class, 'showDet'])->name('showDet');
