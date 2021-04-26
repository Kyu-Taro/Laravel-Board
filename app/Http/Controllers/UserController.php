<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * 特定のユーザーの情報と投稿を取得する
     *
     * @param integer $id
     * @return \Illuminate\View\View
     */
    public function show(int $id) : \Illuminate\View\View
    {
        $service = app(UserService::class);
        $data = $service->show($id);

        return view('user.index', compact('data'));
    }

    /**
     * 認証ユーザーを取得
     *
     * @return \Illuminate\View\View
     */
    public function profile_update_show() : \Illuminate\View\View
    {
        $user = Auth::user();

        return view('user.update_show', compact('user'));
    }

    /**
     * 特定ユーザーのプロフィールレコードを取得してリクエスト内容にupdateする
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request) : \Illuminate\Http\RedirectResponse
    {
        $service = app(UserService::class);
        $service->update($request);

        return redirect(route('user.show', ['id' => Auth::id()]));
    }
}
