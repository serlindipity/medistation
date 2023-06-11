<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/
// Defines an Artisan command named 'inspire'.
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote()); // display a comment-style output in the console
})->purpose('Display an inspiring quote'); // generates a random inspiring quote.
