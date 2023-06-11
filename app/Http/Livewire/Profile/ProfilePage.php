<?php

namespace App\Http\Livewire\Profile;

use App\Models\Follower;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

// Defines ProfilePage and variables
class ProfilePage extends Component
{
    public $user;

    public $followers;

    public $followersCount;

    public $followings;

    public $followingsCount;

    public $posts;

    public $postsCount;

    public function mount()
    {
        // initializes the component's properties with the values from the user model.
        $this->postsCount = $this->user->posts_count;
        $this->followersCount = $this->user->followers_count;
        $this->followingsCount = $this->user->followings_count;
    }

    public function render()
    {
        return view('livewire.profile.profile-page'); // returns the "livewire.profile.profile-page" view.
    }

    public function incrementFollow(User $user) // called when the "Follow" button is clicked.
    {
        // the user's authorization is checked using the "is-not-user-profile" gate.
        Gate::authorize('is-not-user-profile', $this->user);

        // Check if there is already a follow relationship between the authenticated user and the target user.
        $follow = Follower::where('following_id', Auth::id())
            ->where('follower_id', $user->id);

        // If there is no follow relationship, create a new one.
        if (! $follow->count()) {
            $new = Follower::create([
                'following_id' => Auth::id(),
                'follower_id' => $user->id,
            ]);
        } else { // If there is already a follow relationship, delete it to unfollow.
            $follow->delete();
        }

        // Redirect the user back to the profile page of the target user.
        return redirect()->route('profile', ['username' => $user->username]);
    }
}
