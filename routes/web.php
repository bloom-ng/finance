<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [AuthController::class, 'login']);

Route::post('/login', [AuthController::class, 'loginUser'])->name('login-user');

// Dashboard routes
Route::get('/admins/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/secretarys/dashboard', [App\Http\Controllers\Secretary\DashboardController::class, 'index'])->name('secretary.dashboard');

// Incomtypes
// Admin:

Route::get('/admins/income-types', [App\Http\Controllers\Admin\IncomeTypeController::class, 'index'])->name('admin.income-types.index');
Route::get('/admins/income-types/{IncomeType}', [App\Http\Controllers\Admin\IncomeTypeController::class, 'show'])->name('admin.income-types.show');
Route::get('/admins/income-types/create', [App\Http\Controllers\Admin\IncomeTypeController::class, 'create'])->name('admin.income-types.create');
Route::get('/admins/income-types/{IncomeType}/edit', [App\Http\Controllers\Admin\IncomeTypeController::class, 'edit'])->name('admin.income-types.edit');
Route::post('/admins/income-types', [App\Http\Controllers\Admin\IncomeTypeController::class, 'store'])->name('admin.income-types.edit');
Route::put('/admins/income-types', [App\Http\Controllers\Admin\IncomeTypeController::class, 'update'])->name('admin.income-types.update');
Route::delete('/admins/income-types', [App\Http\Controllers\Admin\IncomeTypeController::class, 'delete'])->name('admin.income-types.delete');

//PayerType
Route::get('/admins/payer-types', [App\Http\Controllers\PayerTypeController::class, 'index'])->name('admin.payer-types.index');
Route::get('/admins/payer-types/{PayerType}', [App\Http\Controllers\PayerTypeController::class, 'show'])->name('admin.payer-types.show');
Route::get('/admins/payer-types/create', [App\Http\Controllers\PayerTypeController::class, 'create'])->name('admin.payer-types.create');
Route::get('/admins/payer-types/{PayerType}/edit', [App\Http\Controllers\PayerTypeController::class, 'edit'])->name('admin.payer-types.edit');
Route::post('/admins/payer-types', [App\Http\Controllers\PayerTypeController::class, 'store'])->name('admin.payer-types.edit');
Route::put('/admins/payer-types', [App\Http\Controllers\PayerTypeController::class, 'update'])->name('admin.payer-types.update');
Route::delete('/admins/payer-types', [App\Http\Controllers\PayerTypeController::class, 'delete'])->name('admin.payer-types.delete');