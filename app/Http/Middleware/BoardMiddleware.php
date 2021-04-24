<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Board;
use Illuminate\Support\Facades\Auth;

class BoardMiddleware
{
    /**
     * アクセスしようとする投稿のuser_idとそのユーザーが一致するかを判定し
     * 一致しない場合はアクセスを拒否する
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $param = $request->route()->parameter('id');
        $board = Board::find($param);
        $id = Auth::id();

        if($board->user_id !== $id) {
            return redirect('/board');
        }
        return $next($request);
    }
}
