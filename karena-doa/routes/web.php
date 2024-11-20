<?php

use App\Models\Whatsapp;
use App\Models\AccountNumber;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrphanageController;
use App\Http\Controllers\AccountNumberController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/donation', [HomeController::class, 'donation']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/blog/{slug}', [HomeController::class, 'blogDetail']);
Route::get('/not-found', [HomeController::class, 'notFound']);


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/orphanages', OrphanageController::class)->middleware('auth');
Route::resource('/galleries', GalleryController::class)->middleware('auth');
Route::resource('/account-numbers', AccountNumberController::class)->middleware('auth');
Route::resource('/whatsapps', WhatsappController::class)->middleware('auth');
Route::get('/posts/checkSlug', [PostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/posts', PostController::class)->middleware('auth');
