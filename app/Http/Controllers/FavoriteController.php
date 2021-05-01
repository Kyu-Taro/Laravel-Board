<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Services\FavoriteService;

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
        $service = app(FavoriteService::class);
        $service->store($request);

        return redirect('/board');
    }

    /**
     * お気に入り削除
     *
     * @param Board $board
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Board $board) : \Illuminate\Http\RedirectResponse
    {
        $service = app(FavoriteService::class);
        $service->destroy($board);

        return redirect('/board');
    }
}
