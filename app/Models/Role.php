<?php

// Declares the class belonging to the "App\Models" namespace
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Provides methods for generating model factories.
use Illuminate\Database\Eloquent\Model;                 // Imports the base Model class provided by Laravel.

// Defines Role model
class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',       // ID of the role
        'name',     // Name of the role
    ];

    /**
     * Get the users associated with the role.
     */
    public function users()
    {
        return $this->hasMany(User::class); // Defines a one-to-many relationship with the User model
    }
}
