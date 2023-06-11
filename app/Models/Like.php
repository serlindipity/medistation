<?php

// Declares the class belonging to the "App\Models" namespace
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Provides methods for generating model factories.
use Illuminate\Database\Eloquent\Model;                 // Imports the base Model class provided by Laravel.

// Defines Like model
class Like extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',    // ID of the liked post
        'user_id',    // ID of the user who made the like
    ];
}
