<?php

namespace App\Http\Livewire\Users;

use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public $user;

    public $name;

    public $email;

    public $username;

    public $password;

    public $is_private;

    public $role_id;

    public $password_confirmation;

    // initializes the component's properties with the values from the user model.
    public function mount()
    {
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->role_id = $this->user->role_id;
        $this->is_private = $this->user->is_private;
        $this->password = null;
        $this->password_confirmation = null;
    }

    // responsible for rendering the component's view.
    public function render()
    {
        return view('livewire.users.edit'); // returns the "livewire.users.edit" view.
    }

    // submit method is called when the form is submitted.
    public function submit()
    {
        // form data is being validated using the specified validation rules.
        $this->validate([
            'name' => ['required', 'max:50'],
            'username' => ['string', 'max:60', Rule::unique('users')->ignore($this->user->id)],
            'email' => ['required', 'max:225', Rule::unique('users')->ignore($this->user->id)],
            'is_private' => ['nullable', 'in:0,1'],
            'role_id' => ['required', 'in:1,2'],
            'password' => 'nullable|string|max:225|confirmed',
        ]);

        // Update the user model with the new values from the form.
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->username = $this->username;
        $this->user->role_id = $this->role_id;

        // makes the user private
        if (! is_null($this->is_private)) {
            $this->user->is_private = $this->is_private;
        }

        // edits password
        if (! empty($this->password)) {
            $this->user->password = Hash::make($this->password);
        }

        try {
            $this->user->update(); // Save the updated user model.
            return redirect()->route('users.index');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}
