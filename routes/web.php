<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\EmployeeController::class, 'index']);
    Route::resource('employee', App\Http\Controllers\EmployeeController::class);
    Route::resource('project', App\Http\Controllers\ProjectController::class);
});

Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
