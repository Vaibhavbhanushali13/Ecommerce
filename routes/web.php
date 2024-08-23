<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use Laravel\Socialite\Facades\Socialite;
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

// Route::get('admin', function () {
//     return view('dashboard');
// });
Route::get('/dashboard',[LoginController::class, 'index']);
Route::get('/',[LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/google/redirect', [LoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/facebook/redirect',[LoginController::class, 'redirectToFacebook'])->name('facebook.redirect');
Route::get('/facebook/callback',[LoginController::class, 'handleFacebookCallback'])->name('facebook.callback');

Route::get('/calender/redirect',[GoogleController::class, 'redirect'])->name('calender.redirect');
Route::get('/calender/callback',[GoogleController::class, 'callback'])->name('calender.callback');
Route::get('/create-event', [GoogleController::class,'createEvent']);