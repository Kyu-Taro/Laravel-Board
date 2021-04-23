<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BoardService;

class BoardController extends Controller
{
    /**
     * 全投稿を取得して掲示板トップページを返す
     *
     * @return \Illuminate\View\View
     */
    public function index() : \Illuminate\View\View
    {
        $service = app(BoardService::class);
        $data = $service->index();
        return view('board.index', compact('data'));
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
