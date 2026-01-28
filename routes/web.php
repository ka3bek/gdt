<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Правильные маршруты:
Route::get('/', [PageController::class, 'welcome'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/prices', [PageController::class, 'prices'])->name('prices');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

// Форма обратной связи
Route::post('/callback', [PageController::class, 'callback'])->name('callback.submit');
