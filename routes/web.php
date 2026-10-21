<?php

use App\Http\Controllers\CollectieController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');

Route::view('/', 'home')->name('home');
Route::view('/projecten', 'projecten')->name('projecten');
Route::get('/collectie', [CollectieController::class, 'index'])->name('collectie');
Route::get('/collectie/{slug}', [CollectieController::class, 'show'])->name('collectie.show');
Route::view('/wie-zijn-wij', 'wie-zijn-wij')->name('wie-zijn-wij');
Route::view('/contact', 'contact')->name('contact');
Route::view('/cookies', 'cookies')->name('cookies');
Route::view('/privacy', 'privacy')->name('privacy');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
