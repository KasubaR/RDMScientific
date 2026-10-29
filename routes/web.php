<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

Route::view('/products-applications', 'products', ['catalog' => config('catalog')])->name('products');
Route::redirect('/products', '/products-applications', 301);

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:6,10')
    ->name('contact.store');
