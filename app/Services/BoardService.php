<?php

namespace App\Services;

use App\Models\Board;

class BoardService {

    /**
     * Boardsテーブルから全てを取得して返す
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index() : \Illuminate\Database\Eloquent\Collection
    {
        $data = Board::all();
        return $data;
    }
}
