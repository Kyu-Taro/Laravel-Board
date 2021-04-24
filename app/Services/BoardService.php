<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardService {

    /**
     * Boardsテーブルから全てを取得して返す
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index() : \Illuminate\Database\Eloquent\Collection
    {
        $data = Board::orderBy('created_at', 'desc')->get();
        return $data;
    }

    /**
     * 新規の投稿をboardsテーブルに追加
     *
     * @param array $data
     * @return void
     */
    public function store(array $data) : void
    {
        $board = new Board();
        $board->fill($data)->save();
    }

    public function update(Request $request)
    {
        $board = Board::find($request->id);
        $board->content = $request->content;
        $board->save();
    }
}
