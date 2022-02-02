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
use App\Http\Controllers\AdminController;


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


//Routes for Guest Mode Login
Route::get('/guest/currentSeason', [GuestController::class, 'currentSeason'])->name('guest.currentSeason');
Route::get('/guest/history', [GuestController::class, 'history'])->name('guest.history');
Route::get('/guest/viewSeason/{id}', [GuestController::class, 'viewSeason'])->name('guest.viewSeason');
Route::get('/guest/progress', [GuestController::class, 'progress'])->name('guest.progress');
Route::get('/guest/last-five-seasons', [GuestController::class, 'lastfive'])->name('guest.lastfive');
Route::get('/guest/compare-from-last-season', [GuestController::class, 'comparefromlast'])->name('guest.comparefromlast');

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Routes for Profile
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

//Routes for Dashboard (Current Season)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::post('/startSeason', [DashboardController::class, 'startSeason'])->name('season.start');
Route::post('/endSeason', [DashboardController::class, 'endSeason'])->name('season.end');
Route::post('/updateReminder', [DashboardController::class, 'updateReminder'])->name('reminder.update');

//Routes for Labor
Route::get('/labor', [LaborController::class, 'index'])->name('labor.index');
Route::get('/labor/add', [LaborController::class, 'addLaborer'])->name('labor.add');
Route::post('/labor/add', [LaborController::class, 'addLaborerSubmit'])->name('labor.addSubmit');
Route::get('/labor/delete/{id}', [LaborController::class, 'deleteLaborer'])->name('labor.delete');
Route::get('/labor/edit/{id}', [LaborController::class, 'editLaborer'])->name('labor.edit');
Route::post('/labor/update', [LaborController::class, 'updateLaborer'])->name('labor.update');

//Routes for Laborwage Expenses (Only visible and accessable by Admin account)
Route::group(['middleware' => 'role:administrator||superadministrator'], function () {
	Route::get('/laborwage', [ExpenseController::class, 'laborwage'])->name('expense.laborwage');
	Route::get('/laborwage/record', [ExpenseController::class, 'addWage'])->name('expense.addWage');
	Route::post('/laborwage/recorded', [ExpenseController::class, 'addWageSubmit'])->name('expense.addWageSubmit');
	Route::get('/laborwage/delete/{id}', [ExpenseController::class, 'deleteWage'])->name('expense.deleteWage');
	Route::get('/laborwage/edit/{id}', [ExpenseController::class, 'editWage'])->name('expense.editWage');
	Route::post('/laborwage/update', [ExpenseController::class, 'updateWage'])->name('expense.updateWage');
});

//Routes for Material Expenses
Route::get('/materials', [ExpenseController::class, 'materials'])->name('expense.materials');
Route::get('/materials/record', [ExpenseController::class, 'addMatExpense'])->name('expense.addMatExpense');
Route::post('/materials/recorded', [ExpenseController::class, 'addMatExpenseSubmit'])->name('expense.addMatExpenseSubmit');
Route::get('/materials/delete/{id}', [ExpenseController::class, 'deleteMatExpense'])->name('expense.deleteMatExpense');
Route::get('/materials/edit/{id}', [ExpenseController::class, 'editMatExpense'])->name('expense.editMatExpense');
Route::post('/materials/update', [ExpenseController::class, 'updateMatExpense'])->name('expense.updateMatExpense');

//Routes for Tax
Route::get('/tax', [ExpenseController::class, 'tax'])->name('expense.tax');
Route::get('/tax/record', [ExpenseController::class, 'addTaxExpense'])->name('expense.addTaxExpense');
Route::post('/tax/recorded', [ExpenseController::class, 'addTaxExpenseSubmit'])->name('expense.addTaxExpenseSubmit');
Route::get('/tax/delete/{id}', [ExpenseController::class, 'deleteTaxExpense'])->name('expense.deleteTaxExpense');
Route::get('/tax/edit/{id}', [ExpenseController::class, 'editTaxExpense'])->name('expense.editTaxExpense');
Route::post('/tax/update', [ExpenseController::class, 'updateTaxExpense'])->name('expense.updateTaxExpense');

//Routes for Yields
Route::get('/yields', [YieldController::class, 'index'])->name('yield.index');
Route::get('/yields/add', [YieldController::class, 'addYield'])->name('yield.add');
Route::post('/yields/addSubmit', [YieldController::class, 'addYieldSubmit'])->name('yield.addSubmit');
Route::get('/yields/delete/{id}', [YieldController::class, 'deleteYield'])->name('yield.delete');
Route::get('/yields/edit/{id}', [YieldController::class, 'editYield'])->name('yield.edit');
Route::post('/yields/update', [YieldController::class, 'updateYield'])->name('yield.update');

//Routes for Revenue
Route::get('/revenue', [RevenueController::class, 'index'])->name('revenue.index');
Route::get('/revenue/add', [RevenueController::class, 'addRevenue'])->name('revenue.add');
Route::post('/revenue/addSubmit', [RevenueController::class, 'addRevenueSubmit'])->name('revenue.addSubmit');
Route::get('/revenue/delete/{id}', [RevenueController::class, 'deleteRevenue'])->name('revenue.delete');
Route::get('/revenue/edit/{id}', [RevenueController::class, 'editRevenue'])->name('revenue.edit');
Route::post('/revenue/update', [RevenueController::class, 'updateRevenue'])->name('revenue.update');

//Routes for History
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/viewSeason/{id}', [HistoryController::class, 'viewSeason'])->name('history.view');

//Routes for Progress
Route::get('/progress', [ProgressController::class, 'index'])->name('progress.index');
Route::get('/progress/last-five-seasons', [ProgressController::class, 'lastfive'])->name('progress.lastfive');
Route::get('/progress/compare-from-last-season', [ProgressController::class, 'comparefromlast'])->name('progress.comparefromlast');

//Admin Only
Route::get('/adminSettings', [AdminController::class, 'adminSettings'])->name('adminSettings');
Route::put('/updateFarmcode', [AdminController::class, 'updateFarmcode'])->name('farmcode.update');

//Only Admin can access laratrust
Route::group(['middleware' => 'role:administrator||superadministrator'], function () {
	Route::get('/laratrust', function () {
		return redirect('/laratrust/roles-assignment');
	});
});