<?php

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\GaolediskController;
use App\Http\Controllers\MydiskController;
use App\Http\Controllers\MystoreController;
use App\Http\Controllers\ArrayTableController;
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


Route::get('/auth/social-auth', [SocialAuthController::class,'index'])->name('social-auth');
Route::get('/auth/google/redirect', [SocialAuthController::class,'googleRedirect'])->name('googleRedirect');
Route::get('/auth/google/callback', [SocialAuthController::class,'googleCallback'])->name('googleCallback');

Route::get('/auth/naver/redirect', [SocialAuthController::class,'naverRedirect'])->name('naverRedirect');
Route::get('/auth/naver/callback', [SocialAuthController::class,'naverCallback'])->name('naverCallback');


Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('social-auth');
})->name('logout')->middleware('custom_auth');


Route::get('/dashboard/{tan?}', [Dashboard::class, 'index'])->name('dashboard');
Route::get('/dashboard/detail/{id}', [Dashboard::class, 'detail'])->name('detail')->middleware(['myfavorites','auth']);
Route::post('/dashboard/store/', [Dashboard::class, 'store'])->name('store')->middleware(['myfavorites','auth']);

Route::get('/mypage/gaolestore', [MystoreController::class, 'index'])->name('mypage-gaolestore')->middleware('auth');
Route::post('/mypage/gaolestore', [MystoreController::class, 'store'])->name('mypage-gaolestore-store')->middleware('auth');
Route::delete('/mypage/gaolestore/{id?}', [MystoreController::class, 'destroy'])->name('mypage-gaolestore-delete')->middleware('auth');

Route::get('/mypage/gaoledisk/{tan?}',[MydiskController::class, 'index'])->name('mypage-gaoledisk')->middleware('auth');
Route::get('/mypage/gaoledisk/show/{id}',[MydiskController::class, 'show'])->name('mypage-gaoledisk-show')->middleware('auth');
Route::delete('/mypage/gaoledisk/destroy/{id}',[MydiskController::class, 'destroy'])->name('mypage-gaoledisk-delete')->middleware('auth');

Route::get('/arraytable/datain_ruch5', [ArrayTableController::class, 'datain_ruch5'])->name('datain_ruch5');
Route::get('/arraytable/dataout_ruch5', [ArrayTableController::class, 'dataout_ruch5'])->name('datain_ruch5');
