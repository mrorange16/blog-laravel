<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    //verifica el role se ejecuta antes que los dos metodos anteriores
public function before($user,$ability)
{

if($user->isAdmin()) {
    return true;
}
} 


//Se crea la misma funcion con los siguientes valors
 public function edit(User $authUser, User $user)
    {
         //return dd($user);
        return $authUser->id === $user->id;
        
    }

     public function update(User $authUser, User $user)
    {
        
        return $authUser->id === $user->id;
        
    }
    public function destroy(User $authUser, User $user)
    {
       
       return $authUser->id === $user->id;
        
    }

}
