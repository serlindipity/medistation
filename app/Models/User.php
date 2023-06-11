<?php

// Defines the namespace for the models
namespace App\Models;

// Imports the necessary classes
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable // Define the User model class
{
    // Include the necessary traits for the User model
    use HasApiTokens; // Enables the User model to have API tokens for authentication
    use HasFactory; // Provides the necessary methods for generating model factories
    use HasProfilePhoto;  // Enables the User model to have a profile photo
    use Notifiable; // Enables the user to receive notifications
    use TwoFactorAuthenticatable; // Adds two-factor authentication functionality to the User model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     // Specifies the attributes that are mass assignable
    protected $fillable = [
        'name',         // Name of the user
        'role_id',      // ID of the role assigned to the user
        'username',     // Username of the user
        'email',        // Email of the user
        'password',     // Password of the user
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     // Specifies the attributes that should be hidden
    protected $hidden = [
        'password',                     // Password of the user
        'remember_token',               // Remember token for authentication
        'two_factor_recovery_codes',    // Recovery codes for two-factor authentication
        'two_factor_secret',            // Secret key for two-factor authentication
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    // Specifies the data types for specific attributes
    protected $casts = [
        'is_banned' => 'boolean',           // Cast 'is_banned' attribute to boolean
        'is_private' => 'boolean',          // Cast 'is_private' attribute to boolean
        'email_verified_at' => 'datetime',  // Cast 'email_verified_at' attribute to datetime
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */

    // Specifies additional attributes to append when serializing the model
    protected $appends = [
        'profile_photo_url',
    ];

    // Defines a one-to-many relationship with the Post model
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Defines a one-to-many relationship with the Follower model, using custom foreign keys
    public function followers()
    {
        return $this->hasMany(Follower::class, 'follower_id', 'id');
    }

    // Defines a one-to-many relationship with the Follower model
    public function followings()
    {
        return $this->hasMany(Follower::class, 'following_id');
    }

    // Defines a one-to-many relationship with the Follower model and applies a custom query constraint
    public function isFollowed()
    {
        return $this->hasMany(Follower::class, 'follower_id')->where('following_id', auth()->id());
    }

    // Defines a many-to-one relationship with the Role model
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Checks if the user is an admin based on their role_id attribute
    public function isAdmin()
    {
        return $this->role_id === 2;
    }
}
