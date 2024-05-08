<?php

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Dashboard;
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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard')->middleware('custom_auth');

Route::get('/dashboard/{tan?}', [Dashboard::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('social-auth');
})->name('logout')->middleware('custom_auth');

Route::get('/auth/social-auth', [SocialAuthController::class,'index'])->name('social-auth');
Route::get('/auth/google/redirect', [SocialAuthController::class,'googleRedirect'])->name('googleRedirect');
Route::get('/auth/google/callback', [SocialAuthController::class,'googleCallback'])->name('googleCallback');
