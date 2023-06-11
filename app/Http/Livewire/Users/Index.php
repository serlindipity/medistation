<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $users;

    // executed when the component is initialized
    public function mount()
    {
        // retrieves the users with their related counts of posts, followers, and followings, and orders them by the latest.
        $this->users = User::withCount(['posts', 'followers', 'followings'])->latest()->get();
    }

    // responsible for rendering the component's view.
    public function render()
    {
        return view('livewire.users.index'); // returns the "livewire.users.index" view.
    }
}
