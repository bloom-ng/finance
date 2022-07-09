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

//////////////////////////////////////////////////ADMIN ROUTES//////////////////////////////////////////////////////////////////////////////////////////

// Dashboard routes
Route::get('/admins/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/secretarys/dashboard', [App\Http\Controllers\Secretary\DashboardController::class, 'index'])->name('secretary.dashboard');

// Incomtypes

Route::get('/admins/income-types', [App\Http\Controllers\Admin\IncomeTypeController::class, 'index'])->name('admin.income-types.index');
Route::get('/admins/income-types/create', [App\Http\Controllers\Admin\IncomeTypeController::class, 'create'])->name('admin.income-types.create');
Route::get('/admins/income-types/{incomeType}', [App\Http\Controllers\Admin\IncomeTypeController::class, 'show'])->name('admin.income-types.show');
Route::get('/admins/income-types/{incomeType}/edit', [App\Http\Controllers\Admin\IncomeTypeController::class, 'edit'])->name('admin.income-types.edit');
Route::post('/admins/income-types', [App\Http\Controllers\Admin\IncomeTypeController::class, 'store'])->name('admin.income-types.store');
Route::put('/admins/income-types/{incomeType}', [App\Http\Controllers\Admin\IncomeTypeController::class, 'update'])->name('admin.income-types.update');
Route::delete('/admins/income-types/{incomeType}', [App\Http\Controllers\Admin\IncomeTypeController::class, 'destroy'])->name('admin.income-types.delete');

//PayerType

Route::get('/admins/payer-types', [App\Http\Controllers\Admin\PayerTypeController::class, 'index'])->name('admin.payer-types.index');
Route::get('/admins/payer-types/create', [App\Http\Controllers\Admin\PayerTypeController::class, 'create'])->name('admin.payer-types.create');
Route::get('/admins/payer-types/{payerType}', [App\Http\Controllers\Admin\PayerTypeController::class, 'show'])->name('admin.payer-types.show');
Route::get('/admins/payer-types/{payerType}/edit', [App\Http\Controllers\Admin\PayerTypeController::class, 'edit'])->name('admin.payer-types.edit');
Route::post('/admins/payer-types', [App\Http\Controllers\Admin\PayerTypeController::class, 'store'])->name('admin.payer-types.store');
Route::put('/admins/payer-types/{payerType}', [App\Http\Controllers\Admin\PayerTypeController::class, 'update'])->name('admin.payer-types.update');
Route::delete('/admins/payer-types/{payerType}', [App\Http\Controllers\Admin\PayerTypeController::class, 'destroy'])->name('admin.payer-types.delete');

//Payer

Route::get('/admins/payers', [App\Http\Controllers\Admin\PayerController::class, 'index'])->name('admin.payers.index');
Route::get('/admins/payers/create', [App\Http\Controllers\Admin\PayerController::class, 'create'])->name('admin.payers.create');
Route::get('/admins/payers/{payer}', [App\Http\Controllers\Admin\PayerController::class, 'show'])->name('admin.payers.show');
Route::get('/admins/payers/{payer}/edit', [App\Http\Controllers\Admin\PayerController::class, 'edit'])->name('admin.payers.edit');
Route::post('/admins/payers', [App\Http\Controllers\Admin\PayerController::class, 'store'])->name('admin.payers.store');
Route::put('/admins/payers/{payer}', [App\Http\Controllers\Admin\PayerController::class, 'update'])->name('admin.payers.update');
Route::delete('/admins/payers/{payer}', [App\Http\Controllers\Admin\PayerController::class, 'destroy'])->name('admin.payers.delete');

//Income

Route::get('/admins/incomes', [App\Http\Controllers\Admin\IncomeController::class, 'index'])->name('admin.incomes.index');
Route::get('/admins/incomes/create', [App\Http\Controllers\Admin\incomeController::class, 'create'])->name('admin.incomes.create');
// Route::get('/autocomplete', [App\Http\Controllers\Admin\incomeController::class, 'autoComplete'])->name('autocomplete');
Route::get('/admins/incomess/{income}', [App\Http\Controllers\Admin\IncomeController::class, 'show'])->name('admin.incomes.show');
Route::get('/admins/incomes/{income}/edit', [App\Http\Controllers\Admin\IncomeController::class, 'edit'])->name('admin.incomes.edit');
Route::post('/admins/incomes', [App\Http\Controllers\Admin\IncomeController::class, 'store'])->name('admin.incomes.store');
Route::put('/admins/incomes/{income}', [App\Http\Controllers\Admin\Incomeontroller::class, 'update'])->name('admin.incomes.update');
Route::delete('/admins/incomes/{income}', [App\Http\Controllers\Admin\IncomeController::class, 'destroy'])->name('admin.incomes.delete');

// Reports

Route::get('/admins/reports', [App\Http\Controllers\Admin\AnnualSummaryController::class, 'index'])->name('admin.reports');
Route::get('/admins/reports/annual-summary', [App\Http\Controllers\Admin\AnnualSummaryController::class, 'annual'])->name('admin.reports.annual-summary');


//////////////////////////////////////////////////END OF ADMIN ROUTES//////////////////////////////////////////////////////////////////////////////////////////