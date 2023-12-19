<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class EntryPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function deleteEntry(User $user, Model $model): bool
    {
        return $user->id === $model->user_id;
    }
}
