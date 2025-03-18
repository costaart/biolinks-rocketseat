<?php

namespace App\Policies;

use App\Models\Link;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LinkPolicy
{
   public function update(User $user, Link $link)
   {
       return $user->id === $link->user_id
           ? Response::allow()
           : Response::deny('Você não pode editar este link');

   }
}
