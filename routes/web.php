<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/projecten', 'projecten')->name('projecten');
Route::view('/collectie', 'collectie')->name('collectie');
Route::view('/wie-zijn-wij', 'wie-zijn-wij')->name('wie-zijn-wij');
Route::view('/contact', 'contact')->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
