<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardService {

    /**
     * Boardsテーブルから全てを取得して返す
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index() : \Illuminate\Pagination\LengthAwarePaginator
    {
        $data = Board::orderBy('created_at', 'desc')->paginate(10);
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

    /**
     * 特定の投稿の内容を更新
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request) : void
    {
        $board = Board::find($request->id);
        $board->content = $request->content;
        $board->save();
    }

    /**
     * 指定された投稿を論理削除する
     *
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request) : void
    {
        $data = Board::find($request->id);
        $data->delete();
    }
}
