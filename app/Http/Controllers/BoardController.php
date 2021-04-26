<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BoardService;
use App\Models\Board;
use App\Http\Requests\BoardRequest;

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
    public function store(BoardRequest $request) : \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        unset($data['_token']);

        $service = app(BoardService::class);
        $service->store($data);

        return redirect('/board');
    }

    /**
     * 指定された投稿を取得して返す
     *
     * @param integer $id
     * @return \Illuminate\View\View
     */
    public function show(int $id) : \Illuminate\View\View
    {
        $data = Board::find($id);
        return view('board.board_fix', compact('data'));
    }

    /**
     * 指定された投稿の内容をリクエストの内容に更新
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BoardRequest $request, Board $board) : \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete_update', $board);
        $service = app(BoardService::class);
        $service->update($request);
        return redirect('/board');
    }

    /**
     * 指定された投稿の削除ページに遷移
     *
     * @param integer $id
     * @return \Illuminate\View\View
     */
    public function delete(int $id) : \Illuminate\View\View
    {
        $data = Board::find($id);
        return view('board.delete', compact('data'));
    }

    /**
     * 指定された投稿を論理削除するサービスを呼び出す
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Board $board) : \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete_update', $board);
        $service = app(BoardService::class);
        $service->destroy($request);

        return redirect('/board');
    }
}
