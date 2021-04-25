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
Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'board'], function() {
        //掲示板TOPページ
        Route::get('/', 'BoardController@index')->name('board.index');

        //投稿処理
        Route::post('/', 'BoardController@store')->name('board.store');

        //投稿の編集と削除画面に遷移できるユーザーかチェック
        Route::group(['middleware' => 'board'], function(){
            //投稿編集画面遷移
            Route::get('{id}', 'BoardController@show')->name('board.show');
            //投稿削除画面遷移
            Route::get('delete/{id}', 'BoardController@delete')->name('board.delete');
        });

        //TODO:ここにポリシー
        //投稿のアップデート
        Route::post('update', 'BoardController@update')->name('board.update');

        //TODO:ここにポリシー
        //投稿の削除
        Route::post('destroy', 'BoardController@destroy')->name('board.destroy');
    });

    Route::group(['prefix' => 'user'], function() {
        //指定されたユーザー情報とそのユーザーの投稿一覧ページに遷移
        Route::get('{id}', 'UserController@show')->name('user.show');

        //プロフィール変更ページに遷移
        Route::get('profile/update_show', 'UserController@profile_update_show')->name('user.profile_update_show');

        //TODO:ここにポリシー
        //プロフィール変更の実行
        Route::post('edit', 'UserController@update')->name('user.update');
    });
});
