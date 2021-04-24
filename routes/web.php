<?php

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

//初期画面表示ルート(ログイン画面に飛ぶ)
Route::get('/', function () {
    return view('auth.login');
});

//Auth認証ルート
Auth::routes();

//掲示板TOPページ
Route::get('/board', 'BoardController@index')->name('board.index');

//投稿処理
Route::post('/board', 'BoardController@store')->name('board.store');
