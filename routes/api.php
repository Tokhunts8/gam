<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/insert/nav', 'NavChartController@apiInsert');
Route::get('/countries', 'CountriesTableController@countriesTableApi');
Route::get('/nav', 'NavChartController@navChartApi');

Route::middleware('auAutth:api')->get('/user', function (Request $request) {
    return $request->user();
});
