<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

// Defines UserController
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */

     // Responsible for displaying a listing of users
    public function index(): View|Factory|Application
    {
        $this->authorize('viewAny', auth()->user()); // used to check if the current user is authorized to perform the "viewAny" action on the User model.

        return view('users.index'); // Returns the "users.index" view, to display the listing of users.
    }

    /**
     * @throws AuthorizationException
     */
    // Responsible for displaying the edit form for a specific user.
    public function edit(User $user): Factory|View|Application
    {
        $this->authorize('viewAny', auth()->user()); // used to check if the current user is authorized to perform the "viewAny" action on the User model.

        return view('users.edit', compact('user')); // Returns the "users.edit" view, passing the $user variable to the view.
    }
}
