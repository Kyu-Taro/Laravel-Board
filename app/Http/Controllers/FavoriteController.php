<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use Illuminate\Support\Facades\Auth;
use App\User;

class FavoriteController extends Controller
{
    /**
     * お気に入りの登録
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) : \Illuminate\Http\RedirectResponse
    {
        $id = $request->board_id;
        $board = Board::find($id);
        $board->favorites()->attach(Auth::id());

        return redirect('/board');
    }

    public function destroy(Board $board)
    {
        $board->favorites()->detach(Auth::id());

        return redirect('/board');
    }
}