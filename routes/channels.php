<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Defines channel for broadcasting messages to authenticated users based on their user ID.
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
    // If the comparison evaluates to true, the user is granted permission to join the channel.
    // If the comparison evaluates to false, the user is denied access to the channel.
});
