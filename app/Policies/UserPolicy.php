<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function editProfile(User $user, Model $model): bool
    {
        return $user->id === $model->id;
    }

    public function followAccount(User $user, Model $model): bool
    {
        return $user->id !== $model->id && (!$user->follows($model));
    }

    public function unfollowAccount(User $user, Model $model): bool {
        return $user->id !== $model->id && $user->follows($model);
    }

    public function AccessSettings(User $user, Model $model): bool {
        return $user->id === $model->id;
    }

    public function deleteAccount(User $user, Model $model): bool {
        return $user->id === $model->id;
    }
}
