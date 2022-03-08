<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;


Route::prefix('admin')->name('admin')->middleware('auth')->group(function ()
{
    Route::get('/',[AdminController::class,'index'])->name('index');
});

Route::get('/',function(){
    return 'Home Page';
})->name('homepage');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
