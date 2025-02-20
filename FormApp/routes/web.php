<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'contactList'])->name('contact-list');
Route::get('/contact', [ContactController::class, 'create'])->name('new-contact');
Route::post('/contact', [ContactController::class, 'store']);