<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('department', DepartmentController::class)->middleware('auth');
Route::resource('salary', SalaryController::class)->middleware('auth');
Route::resource('deduction', DeductionController::class)->middleware('auth');
Route::resource('employee', EmployeeController::class)->middleware('auth');
Route::resource('employee_salary', EmployeeSalaryController::class)->middleware('auth');

// Auth
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
