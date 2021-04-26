<?php

namespace App\Policies;

use App\User;
use App\Models\Board;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoardPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * ユーザIDと投稿者が一致するかを判定する(更新と削除で使用)
     *
     * @param User $user
     * @param Board $board
     * @return bool
     */
    public function delete_update(User $user, Board $board) : bool
    {
        return $user->id === $board->user_id;
    }
}
