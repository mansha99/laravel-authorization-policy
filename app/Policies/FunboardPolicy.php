<?php

namespace App\Policies;

use App\Models\Funboard;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FunboardPolicy
{

    public function updateMessage(User $user, Funboard $funboard): Response
    {
        return $user->id === $funboard->user_id ? Response::allow()
            : Response::deny('You do not own this post.');
    }
    public function updateStatus(User $user, Funboard $funboard): Response
    {
        return $user->role == "admin" ? Response::allow()
            : Response::deny('Only Admin can do this');
    }
}
