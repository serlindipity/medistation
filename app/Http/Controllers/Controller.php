<?php

namespace App\Http\Controllers;

// The Controller class serves as the base class for all other controllers in the application.
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Provides authorization-related functionality
use Illuminate\Foundation\Bus\DispatchesJobs;             // Enables the dispatching of jobs and events
use Illuminate\Foundation\Validation\ValidatesRequests;   // Provides validation-related functionality
use Illuminate\Routing\Controller as BaseController;      // Provides basic controller functionalities.

// Defines Controller
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
