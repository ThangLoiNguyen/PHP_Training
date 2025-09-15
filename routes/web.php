<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('emails', EmailController::class);
Route::post('/emails/{id}/restore', [EmailController::class, 'restore'])->name('emails.restore');

