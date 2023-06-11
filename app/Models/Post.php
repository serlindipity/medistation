<?php

// Declares the class belonging to the "App\Models" namespace
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Provides methods for generating model factories.
use Illuminate\Database\Eloquent\Model;                 // Imports the base Model class provided by Laravel.
use Illuminate\Database\Eloquent\SoftDeletes;           // Imports the "SoftDeletes" trait from Laravel.

// Defines Post model
class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',    // ID of the user who created the post
        'title',      // Title of the post
        'location',   // Location associated with the post
        'body',       // Body or content of the post
    ];

    public function postImages()
    {
        return $this->hasMany(Media::class); // Defines a one-to-many relationship with the Media model
    }

    public function tags()
    {
        return $this->hasMany(Tag::class); // Defines a one-to-many relationship with the Tag model
    }

    public function likes()
    {
        return $this->hasMany(Like::class); // Defines a one-to-many relationship with the Like model
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest(); // Defines a one-to-many relationship with the Comment model and orders the comments by the latest ones
    }

    public function userLikes()
    {
        return $this->hasMany(Like::class)->where('user_id', auth()->id()); // Defines a one-to-many relationship with the Like model and applies a query constraint to retrieve only likes from the authenticated user
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Defines a many-to-one relationship with the User model
    }
}
