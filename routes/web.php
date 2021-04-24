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

//認証済みユーザーのみアクセスできる
Route::group(['middleware' => 'auth'], function(){
    //掲示板TOPページ
Route::get('/board', 'BoardController@index')->name('board.index');

//投稿処理
Route::post('/board', 'BoardController@store')->name('board.store');

//投稿の編集と削除画面に遷移できるユーザーかチェック
Route::group(['middleware' => 'board'], function(){
    //投稿編集画面遷移
    Route::get('/board/{id}', 'BoardController@show')->name('board.show');
});

//投稿のアップデート
Route::post('/board/update', 'BoardController@update')->name('board.update');
});
