<?php

use App\Models\AvailableTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\AvailableTimeController;
use App\Http\Controllers\Admin\PatientsController;
use App\Http\Controllers\Admin\DepartmentController;

Route::prefix('admin')->name('admin.')->middleware('auth', 'check_type')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/change-password', [AdminController::class, 'change_password'])->name('change_password');

    // admin.departments.index
    // admin.departments.create
    // admin.departments.store
    // admin.departments.edit
    // admin.departments.update
    // admin.departments.destroy
    // admin.departments.show

    Route::resource('departments', DepartmentController::class);
    Route::resource('doctors', DoctorsController::class);
    Route::resource('patient', PatientsController::class);


});

Route::resource('appointment', AppointmentController::class);
Route::resource('availabletime', AvailableTimeController::class);
Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/doctors-of-department/{id}', [HomeController::class, 'doctorsOfDepartment'])->name('doctors-of-department');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/not-allowed', 'not_allowed');

Route::get('verify-doctor/{id}', [DoctorsController::class, 'verify_doctor'])->name('verify_doctor');


