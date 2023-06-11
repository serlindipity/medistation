<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\DeletesUsers;

// Defines DeleteUSer
class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     *
     * @return void
     */

     // responsible for deleting user
    public function delete($user)
    {
        $user->deleteProfilePhoto(); // Delete the user's profile photo.
        $user->tokens->each->delete(); // Delete all the user's tokens.
        $user->delete(); // Delete the user.
    }
}
