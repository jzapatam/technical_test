<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\EmployeeController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
Route::resource('/companies', CompanyController::class, ['except' => ['show']]);
Route::resource('/employees', EmployeeController::class, ['except' => ['show']]);


