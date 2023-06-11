<?php

// Declares the class belonging to the "App\Models" namespace
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Provides methods for generating model factories.
use Illuminate\Database\Eloquent\Model;                 // Imports the base Model class provided by Laravel.

// Defines Follower model
class Follower extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'follower_id',    // ID of the follower
        'following_id',   // ID of the user being followed
    ];
     
    /**
     * Get the user who owns the follower relationship.
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Defines a many-to-one relationship with the User model
    }
}
