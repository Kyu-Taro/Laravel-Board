<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Board;
use Illuminate\Support\Facades\Mail;
use App\Mail\FavoriteMail;

class FavoriteService {

    /**
     * 新規お気に入り登録
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) : void
    {
        $id = $request->board_id;
        $board = Board::find($id);
        $board->favorites()->attach(Auth::id());

        $user = Auth::user();
        Mail::to(Auth::user()->email)->queue(new FavoriteMail($board, $user));
    }

    /**
     * お気に入り削除
     *
     * @param Board $board
     * @return void
     */
    public function destroy(Board $board)
    {
        $board->favorites()->detach(Auth::id());
    }
}
