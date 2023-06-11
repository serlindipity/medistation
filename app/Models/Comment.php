<?php

// Declares the class belonging to the "App\Models" namespace
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Provides methods for generating model factories.
use Illuminate\Database\Eloquent\Model;                 // Imports the base Model class provided by Laravel.

// Defines Comment model
class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',    // ID of the commented post
        'user_id',    // ID of the user who made the comment
        'comment',    // The comment content
    ];

     /**
     * Get the user who made the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Defines a many-to-one relationship with the User model
    }
}
