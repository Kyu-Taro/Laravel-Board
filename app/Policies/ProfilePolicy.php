<?php

namespace App\Policies;

use App\User;
use App\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
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
     * 認証ユーザーのIDとProfilesテーブルのuser_idが一致すれば許可する
     *
     * @param User $user
     * @param Profile $profile
     * @return boolean
     */
    public function update(User $user,Profile $profile) : bool
    {
        return $user->id === $profile->user_id;
    }
}
