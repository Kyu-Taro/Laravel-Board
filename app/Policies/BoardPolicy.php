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

    public function delete_update(User $user, Board $board)
    {
        return $user->id === $board->user_id;
    }
}
