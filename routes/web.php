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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', function () {
//    return view('dailyreports.index');
//});

// トップ画面表示・一覧取得
//Route::get('/', 'DailyreportController@index')->name('dailyreports.index');

// トップ＝検索＆検索結果表示画面
Route::get('/', 'DailyreportController@index')->name('dailyreports.index');

// 検索機能
Route::get('/search', 'DailyreportController@search')->name('dailyreports.search');

//Route::get('/create', function () {
//    return view('dailyreports.create');
//});

// 新規登録画面表示
Route::get('/create', 'DailyreportController@showCreateReport')->name('dailyreports.create');

// 新規登録機能
Route::post('/register', 'DailyreportController@createDailyReport')->name('dailyreports.register');

//Route::get('/show', function () {
//    return view('dailyreports.show');
//});

//Route::get('/edit', function () {
//    return view('dailyreports.edit');
//});

// 編集画面表示
Route::get('/edit/{id}', 'DailyreportController@editDailyReport')->name('dailyreports.edit');

// 編集機能
Route::post('/update/{id}', 'DailyreportController@updateDailyReport')->name('dailyreports.update');

// 削除機能
Route::post('/delete/{id}', 'DailyreportController@deleteDailyReport')->name('dailyreports.delete');
