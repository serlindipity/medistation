<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProfileController extends Controller
{
    protected $post;

    /**
     * Display the specified resource.
     *
     * @param $username
     * @return Application|Factory|View
     */

    // responsible for displaying the profile of a specific user.
    public function show($username): View|Factory|Application
    {
        // Retrieves the user with the given $username from the database.
        $user = User::with(['isFollowed'])->withCount(['posts', 'followers', 'followings'])->where('username', $username)->firstOrFail();
        //$this->posts = Post::select('id')->where('user_id', $user->id)->withCount(['likes', 'comments'])->get();
        return view('profile', compact('user')); // Returns the "profile" view, passing the $user variable to the view.
    }
}
