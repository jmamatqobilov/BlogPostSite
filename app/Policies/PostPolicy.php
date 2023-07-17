<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    public function update(User $user, Application $post): bool
    {
        // dd($user);
        if($user->role_id === 1){
            return true;
        }
        return $user->id === $post->user_id;
    }
    public function delete(User $user, Application $post): bool
    {
        // dd($user);
        if($user->role_id === 1){
            return true;
        }
        return $user->id === $post->user_id;
    }
}
