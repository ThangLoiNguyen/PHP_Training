<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/', [EmailController::class, 'index'])->name('emails.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::resource('emails', EmailController::class);
Route::post('/emails/{id}/restore', [EmailController::class, 'restore'])->name('emails.restore');

