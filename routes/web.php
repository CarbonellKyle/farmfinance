<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaborController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\YieldController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\GuestController;


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
    return view('welcome');
});

//Footer Links Routes
Route::get('/about_us', function(){return view('aboutUs');});
Route::get('/developer', function(){return view('developer');});
Route::get('/contact_us', function(){return view('contactUs');});


//Routes for Guest Login
Route::get('/guest/currentSeason', [App\Http\Controllers\GuestController::class, 'currentSeason'])->name('guest.currentSeason');
Route::get('/guest/history', [App\Http\Controllers\GuestController::class, 'history'])->name('guest.history');
Route::get('/guest/viewSeason/{id}', [App\Http\Controllers\GuestController::class, 'viewSeason'])->name('guest.viewSeason');
Route::get('/guest/progress', [App\Http\Controllers\GuestController::class, 'progress'])->name('guest.progress');
Route::get('/guest/last-five-seasons', [App\Http\Controllers\GuestController::class, 'lastfive'])->name('guest.lastfive');
Route::get('/guest/compare-from-last-season', [App\Http\Controllers\GuestController::class, 'comparefromlast'])->name('guest.comparefromlast');

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

//Routes for Dashboard (Current Season)
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
Route::post('/startSeason', [App\Http\Controllers\DashboardController::class, 'startSeason'])->name('season.start');
Route::post('/endSeason', [App\Http\Controllers\DashboardController::class, 'endSeason'])->name('season.end');
Route::post('/updateReminder', [App\Http\Controllers\DashboardController::class, 'updateReminder'])->name('reminder.update');

//Routes for Labor
Route::get('/labor', [App\Http\Controllers\LaborController::class, 'index'])->name('labor.index');
Route::get('/labor/add', [App\Http\Controllers\LaborController::class, 'addLaborer'])->name('labor.add');
Route::post('/labor/add', [App\Http\Controllers\LaborController::class, 'addLaborerSubmit'])->name('labor.addSubmit');
Route::get('/labor/delete/{id}', [App\Http\Controllers\LaborController::class, 'deleteLaborer'])->name('labor.delete');
Route::get('/labor/edit/{id}', [App\Http\Controllers\LaborController::class, 'editLaborer'])->name('labor.edit');
Route::post('/labor/update', [App\Http\Controllers\LaborController::class, 'updateLaborer'])->name('labor.update');

//Routes for Expenses
Route::get('/laborwage', [App\Http\Controllers\ExpenseController::class, 'laborwage'])->name('expense.laborwage');
Route::get('/laborwage/record', [App\Http\Controllers\ExpenseController::class, 'addWage'])->name('expense.addWage');
Route::post('/laborwage/recorded', [App\Http\Controllers\ExpenseController::class, 'addWageSubmit'])->name('expense.addWageSubmit');
Route::get('/laborwage/delete/{id}', [App\Http\Controllers\ExpenseController::class, 'deleteWage'])->name('expense.deleteWage');
Route::get('/laborwage/edit/{id}', [App\Http\Controllers\ExpenseController::class, 'editWage'])->name('expense.editWage');
Route::post('/laborwage/update', [App\Http\Controllers\ExpenseController::class, 'updateWage'])->name('expense.updateWage');

Route::get('/materials', [App\Http\Controllers\ExpenseController::class, 'materials'])->name('expense.materials');
Route::get('/materials/record', [App\Http\Controllers\ExpenseController::class, 'addMatExpense'])->name('expense.addMatExpense');
Route::post('/materials/recorded', [App\Http\Controllers\ExpenseController::class, 'addMatExpenseSubmit'])->name('expense.addMatExpenseSubmit');
Route::get('/materials/delete/{id}', [App\Http\Controllers\ExpenseController::class, 'deleteMatExpense'])->name('expense.deleteMatExpense');
Route::get('/materials/edit/{id}', [App\Http\Controllers\ExpenseController::class, 'editMatExpense'])->name('expense.editMatExpense');
Route::post('/materials/update', [App\Http\Controllers\ExpenseController::class, 'updateMatExpense'])->name('expense.updateMatExpense');

Route::get('/tax', [App\Http\Controllers\ExpenseController::class, 'tax'])->name('expense.tax');
Route::get('/tax/record', [App\Http\Controllers\ExpenseController::class, 'addTaxExpense'])->name('expense.addTaxExpense');
Route::post('/tax/recorded', [App\Http\Controllers\ExpenseController::class, 'addTaxExpenseSubmit'])->name('expense.addTaxExpenseSubmit');
Route::get('/tax/delete/{id}', [App\Http\Controllers\ExpenseController::class, 'deleteTaxExpense'])->name('expense.deleteTaxExpense');
Route::get('/tax/edit/{id}', [App\Http\Controllers\ExpenseController::class, 'editTaxExpense'])->name('expense.editTaxExpense');
Route::post('/tax/update', [App\Http\Controllers\ExpenseController::class, 'updateTaxExpense'])->name('expense.updateTaxExpense');

//Routes for Yields
Route::get('/yields', [App\Http\Controllers\YieldController::class, 'index'])->name('yield.index');
Route::get('/yields/add', [App\Http\Controllers\YieldController::class, 'addYield'])->name('yield.add');
Route::post('/yields/addSubmit', [App\Http\Controllers\YieldController::class, 'addYieldSubmit'])->name('yield.addSubmit');
Route::get('/yields/delete/{id}', [App\Http\Controllers\YieldController::class, 'deleteYield'])->name('yield.delete');
Route::get('/yields/edit/{id}', [App\Http\Controllers\YieldController::class, 'editYield'])->name('yield.edit');
Route::post('/yields/update', [App\Http\Controllers\YieldController::class, 'updateYield'])->name('yield.update');

//Routes for Revenue
Route::get('/revenue', [App\Http\Controllers\RevenueController::class, 'index'])->name('revenue.index');
Route::get('/revenue/add', [App\Http\Controllers\RevenueController::class, 'addRevenue'])->name('revenue.add');
Route::post('/revenue/addSubmit', [App\Http\Controllers\RevenueController::class, 'addRevenueSubmit'])->name('revenue.addSubmit');
Route::get('/revenue/delete/{id}', [App\Http\Controllers\RevenueController::class, 'deleteRevenue'])->name('revenue.delete');
Route::get('/revenue/edit/{id}', [App\Http\Controllers\RevenueController::class, 'editRevenue'])->name('revenue.edit');
Route::post('/revenue/update', [App\Http\Controllers\RevenueController::class, 'updateRevenue'])->name('revenue.update');

//Routes for History
Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history.index');
Route::get('/viewSeason/{id}', [App\Http\Controllers\HistoryController::class, 'viewSeason'])->name('history.view');

//Routes for Progress
Route::get('/progress', [App\Http\Controllers\ProgressController::class, 'index'])->name('progress.index');
Route::get('/progress/last-five-seasons', [App\Http\Controllers\ProgressController::class, 'lastfive'])->name('progress.lastfive');
Route::get('/progress/compare-from-last-season', [App\Http\Controllers\ProgressController::class, 'comparefromlast'])->name('progress.comparefromlast');
