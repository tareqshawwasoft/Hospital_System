<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepartmentController;

Route::prefix('admin')->name('admin.')->middleware('auth', 'check_type')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // admin.departments.index
    // admin.departments.create
    // admin.departments.store
    // admin.departments.edit
    // admin.departments.update
    // admin.departments.destroy
    // admin.departments.show
    Route::resource('departments', DepartmentController::class);

});


Route::get('/', function() {

     return view('index');
})->name('homepage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/not-allowed', 'not_allowed');
