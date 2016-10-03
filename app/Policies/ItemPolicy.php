<?php
namespace App\Policies;

use App\User;
use App\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
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

    public function rate(User $user) {
        return $user->id != 0;
    }

    public function update(User $user) {
        return $user->id == 0;
    }
}
