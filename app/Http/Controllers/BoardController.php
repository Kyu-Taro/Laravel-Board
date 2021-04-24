<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BoardService;
use App\Models\Board;

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

    /**
     * 新規投稿登録
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) : \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        unset($data['_token']);

        $service = app(BoardService::class);
        $service->store($data);

        return redirect('/board');
    }
}
