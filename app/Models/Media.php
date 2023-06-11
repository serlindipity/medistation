<?php

// Declares the class belonging to the "App\Models" namespace
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Provides methods for generating model factories.
use Illuminate\Database\Eloquent\Model;                 // Imports the base Model class provided by Laravel.

// Defines Meida model
class Media extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',    // ID of the associated post
        'path',       // Path of the media file
        'is_image',   // Indicates whether the media is an image or not
    ];

    public function post()
    {
        return $this->belongsTo(Post::class); // Defines a many-to-one relationship with the Post model
    }
}
