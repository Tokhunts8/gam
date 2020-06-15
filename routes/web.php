<?php

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

Route::get('/', function () {
    return redirect('/main/am');
});

Route::get('/main/{locale}', 'MainController@index');
Route::get('/main/{locale}/aboutus', 'MainController@about');
Route::get('/main/{locale}/foundation', 'MainController@foundation');

Auth::routes();

Route::get('/home', function () {
    return redirect('admin/blog');
});

Route::get('/admin', function () {
    return redirect('admin/blog');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('blog', 'BlogController');
    Route::resource('workers', 'WorkersController');
    Route::resource('about', 'ExperienceEducationController');
    Route::resource('news', 'NewsController');
    Route::resource('countriesTable', 'CountriesTableController');
    Route::resource('assetAllocation', 'AssetAllocationController');
    Route::resource('maturitySummary', 'MaturitySummaryController');
    Route::resource('currencies', 'ByCurrenciesController');
    Route::resource('areas', 'ByAreasController');
    Route::resource('fund', 'FundPerformanceController');
    Route::resource('nav', 'NavChartController');
    Route::resource('contacts', 'ContactsController');
    Route::resource('company', 'CompanyController');
    Route::resource('rule', 'RulesController');
    Route::resource('foundation', 'FoundationController');
});
