<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\User;
use App\Models\Board;
use App\Models\Profile;

class UserService {

    /**
     * 特定のユーザーとそのユーザーの投稿を取得する
     *
     * @param integer $id
     * @return array
     */
    public function show(int $id) : array
    {
        $user = User::find($id);
        $boards = Board::where('user_id', $id)->get();

        $data = [
            'user' => $user,
            'boards' => $boards,
        ];

        return $data;
    }

    /**
     * ユーザーIDが一致するprofilesレコードにリクエスト内容でupdateする
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request) : void
    {
        $profile = Profile::where('user_id', $request->user_id)->first();
        $profile->fill($request->all())->save();
    }
}
