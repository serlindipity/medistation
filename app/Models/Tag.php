<?php

// Declares the class belonging to the "App\Models" namespace
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Provides methods for generating model factories.
use Illuminate\Database\Eloquent\Model;                 // Imports the base Model class provided by Laravel

// Defines Tag model
class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',         // Unique identifier for the tag
        'post_id',     // ID of the associated post
    ];

    /**
     * Get the post that owns the tag.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
