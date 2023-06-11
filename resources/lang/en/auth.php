<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    // Error message displayed when the user enters incorrect login credentials.
    // Indicates that the provided credentials (email/username and password) do not match any records in the system.

    'password' => 'The provided password is incorrect.',
    // Error message shown when the user enters an incorrect password during authentication.
    // Indicates that the provided password does not match the password associated with the provided user credentials.

    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    // Error message displayed when there have been too many login attempts within a certain time frame.
    // Informs the user that they need to wait for a specific duration (indicated by :seconds) before attempting to log in again.
];
