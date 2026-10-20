<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');

Route::view('/', 'home')->name('home');
Route::view('/projecten', 'projecten')->name('projecten');
Route::view('/collectie', 'collectie')->name('collectie');
Route::view('/wie-zijn-wij', 'wie-zijn-wij')->name('wie-zijn-wij');
Route::view('/contact', 'contact')->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
