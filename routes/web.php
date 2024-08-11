<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('sitemap.html', [HomeController::class, 'sitemap'])->name('sitemap');